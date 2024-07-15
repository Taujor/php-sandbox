<?php

require __DIR__ . "/../src/classes/Request.php";
require __DIR__ . "/../src/classes/Router.php";
require __DIR__ . "/../src/classes/Renderer.php";

$router = new Router;
$template = new Renderer("../templates/views/");

$content = match($router->get()){
    "/" => $template->render("home.php"),
    default => $template->render("404.php")
};

register_shutdown_function(function () use ($template, $content) {
    echo $template->layout(__DIR__ . "/../templates/layouts/main.php", ["title" => "home", "content" => $content]);
});
