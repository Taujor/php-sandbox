<?php
namespace Taujor\Sandbox;
require "../vendor/autoload.php";

mb_internal_encoding("UTF-8");
mb_http_output("UTF-8");

$template = new Renderer();
$router = new Router($template);

$router->get("/", fn() =>
    $template->layout("main", [
        "content" => $template->view("home")
    ])
);

echo $router->dispatch();