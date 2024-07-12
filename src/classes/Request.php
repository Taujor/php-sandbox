<?php

class Request {
    public $path;
    public $method;

    public function __construct()
    {
        $this->path = parse_url($_SERVER['REQUEST_URI'])["path"];
        $this->method = $_SERVER['REQUEST_METHOD'];   
    }
}