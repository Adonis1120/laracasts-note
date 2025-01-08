<?php

/*
if ($uri == "/") {
    require "controllers/index.php";
} elseif ($uri == "/about") {
    require "controllers/about.php";
} elseif ($uri == "/contact") {
    require "controllers/contact.php";
}
*/

$routes = require "routes.php";

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort(Response::NOT_FOUND);
    }
}

function abort($code = 404) {
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);