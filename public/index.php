<?php
mb_internal_encoding("UTF-8");
mb_http_output("UTF-8");

require "../vendor/autoload.php";
require "../config/routes.php";

echo $router->dispatch();