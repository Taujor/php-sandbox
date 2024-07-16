<?php
namespace Taujor\Sandbox;
$template = new Renderer();
$router = new Router($template);


$router->get("/", fn() =>
    $template->layout("main", [
        "title" => "home",
        "content" => $template->view("home")
    ])
);