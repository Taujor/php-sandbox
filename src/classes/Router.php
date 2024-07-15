<?php

class Router {
    public $request;
    public $valid = [
        0=>"/"
    ];

    public function __construct (){
        $this->request = new Request();
    }

    public function get (){
        if($this->request->method === "GET" && in_array($this->request->path, $this->valid)){
            return $this->request->path;
        } else {
            return false;
        };
    }
}