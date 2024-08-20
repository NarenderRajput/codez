<?php

namespace src\http;

class Request {

    public $data;

    public function __construct() {
        $this->data = [];
    }

    public function __get($name) {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        } else {
            return null;
        }
    }
}