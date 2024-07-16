<?php
namespace Taujor\Sandbox;

class Router {
    protected string $path;
    protected string $method;

    protected array $routes = [
        "get" => [],
        "post" => []
    ];

    public function __construct (protected Renderer $renderer){
        $this->path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->method = mb_strtolower($_SERVER['REQUEST_METHOD']);   
    }

    protected function addRoute (string $method, string $path, $handler){
        if(!isset($this->routes[$method])){
            throw new \Exception("Error: http method '$method' is not compatible with router", 1);
        }
        $this->routes[$method][$path] = $handler;
    }

    public function get ($path, $handler){
        $this->addRoute("get", $path, $handler);
    }

    public function post ($path, $handler){
        $this->addRoute("post", $path, $handler);
        
    }

    public function dispatch(){
        if(!isset($this->routes[$this->method][$this->path]) || !empty($_SERVER["QUERY_STRING"])){
            http_response_code(404);
            $template = $this->renderer;
            return $template->layout("main", [
                "content" => $template->view("error", [
                    "status" => 404,
                    "message" => "This page does not exist"
                ]),
                "title" => "Error - 404"
            ]); 
        } else {
            header_remove("X-Powered-By");
            header("Content-Type: text/html; charset=utf-8");
            $handler = $this->routes[$this->method][$this->path];
            return $handler();
        }
    }

}