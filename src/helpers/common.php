<?php

if (!function_exists('view')) {
    function view(String $view, array $data = [])
    {
        return [
            'src/views/' . $view, $data
        ];
    }
}

if (!function_exists('include_view')) {
    function include_view(String $view)
    {
        include_once 'src/views/' . $view . '.php';
    }
}

if (!function_exists('dd')) {
    function dd(...$data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit;
    }
}

if (!function_exists('show_error_page')) {
    function show_error_page(String $message = 'Something went wrong!')
    {
        include_once __DIR__ . '/../../error_page.php';
        exit;
    }
}

if (!function_exists('create_route')) {
    function create_route(String $method, String $url, String $controller, String $action)
    {
        return [
            'method' => $method,
            'url' => $url,
            'action' => ['src\controllers\\'.$controller,  $action]
        ];
    }
}
