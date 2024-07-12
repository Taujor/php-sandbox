<?php

require __DIR__ . "/../src/classes/Request.php";
require __DIR__ . "/../src/classes/Router.php";

$router = new Router;

ob_start();

match($router->get()){
    "/" => require __DIR__ . "/../templates/views/home.php",
    default => require __DIR__ . "/../templates/views/404.php"
};

$content = ob_get_clean();

register_shutdown_function(function () use ($content, $meta) {
    require __DIR__ . "/../templates" . "/layouts" . "/main.php";
});
