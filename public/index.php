<?php
mb_internal_encoding("UTF-8");
mb_http_output("UTF-8");

require __DIR__ . "/../src/classes/Router.php";
require __DIR__ . "/../src/classes/Renderer.php";

$router = new Router;
$template = new Renderer("../templates/views/");

$content = match($router->get()){
    "/" => $template->render("home"),
    default => $template->render("404")
};

register_shutdown_function(function () use ($template, $content) {
    echo $template->layout("main", [
        "title" => "home",
        "content" => $content
    ]);
});
