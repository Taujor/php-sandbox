<?php
mb_internal_encoding("UTF-8");
mb_http_output("UTF-8");

require __DIR__ . "/../src/classes/Router.php";
require __DIR__ . "/../src/classes/Renderer.php";

$router = new Router();
$template = new Renderer();

$content = match($router->get()){
    "/" => $template->render(__DIR__ . "/../templates/views/home.php"),
    default => $template->render(__DIR__ . "/../templates/views/404.php")
};

register_shutdown_function(function () use ($template, $content) {
    echo $template->render(__DIR__ . "/../templates/layouts/main.php", [
        "title" => "home",
        "content" => $content
    ]);
});
