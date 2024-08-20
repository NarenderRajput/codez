<?php

namespace src\routes;

use config\Errors;
use src\http\Request;

class Route
{

    public $request;
    public $routes;
    public $path;
    public $method;

    public function __construct()
    {
        $this->request = new Request();
        $this->routes = include_once __DIR__ . '/router.php';
        $this->method = $_SERVER['REQUEST_METHOD'];
        
        if ($this->method === 'POST') {
            $this->request->data = $_POST;
        }

        $url = parse_url(str_replace('/' . ROOT . '/', '', $_SERVER['REQUEST_URI']));

        $this->path = $url['path'];
        $this->request->data['query'] = $_GET;
    }

    static public function init()
    {
        $instance = new self();
        call_user_func([$instance, 'execute']);
    }

    public function execute()
    {
        try {
            $action = $this->getAction();

            if (!$action) {
                show_error_page(Errors::ERROR_404);
            }

            $class = new $action[0]();
            $view = $class->{$action[1]}($this->request);

            foreach ($view[1] as $key => $value) {
                $$key = $value;
            }

            include_once $view[0] . '.php';
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAction()
    {
        $action = [];
        $params = [];
        
        foreach ($this->routes as $route) {
            $sections = explode('/', $route['url']);
            $path_sec = explode('/', $this->path);
            $matched = true;
            
            if (count($sections) !== count($path_sec)) {
                continue;
            }

            for ($i = 0; $i < count($sections); $i++) {
                if (false !== strpos($sections[$i], '{') && false !== strpos($sections[$i], '}')) {
                    $nm = str_replace('{', '', str_replace('}', '', $sections[$i]));
                    $params[$nm] = $path_sec[$i];
                    continue;
                }

                if ($sections[$i] != $path_sec[$i]) {
                    $matched = false;
                    break;
                }
            }

            if ($matched) {
                if(strtolower($this->method) !== strtolower($route['method'])) {
                    show_error_page(Errors::METHOD_NOT_ALLOWED);
                    break;
                }

                $this->request->data = array_merge($this->request->data, $params);
                $action = $route['action'];
                break;
            }
        }

        return count($action) > 0 ? $action : null;
    }
}
