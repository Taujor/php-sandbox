<?php
namespace Taujor\Sandbox;

class Router {
    protected string $path;
    protected string $method;
    protected array $valid = [
        0=>"/"
    ];

    public function __construct (){
        $this->path = parse_url($_SERVER['REQUEST_URI'])["path"];
        $this->method = $_SERVER['REQUEST_METHOD'];   
    }

    public function get (){
        if($this->method === "GET" && in_array($this->path, $this->valid)){
            return $this->path;
        } else {
            return false;
        };
    }
}