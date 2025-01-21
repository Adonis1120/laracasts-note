<?php

/*
use Core\Response;

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort(Response::NOT_FOUND);
    }
}

function abort($code = 404) {
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

$routes = require base_path("routes.php");
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);
*/

namespace Core;

use Core\Middleware\Middleware;

Class Router {
    protected $routes = [];

    public function add($method, $uri, $controller) {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method,
            "middleware" => null
        ];

        return $this;
    }

    public function get($uri, $controller) {
        return $this->add("GET", $uri, $controller);
        /*
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => "GET"
        ];
        */
    }

    public function post($uri, $controller) {
        return $this->add("POST", $uri, $controller);
        /*
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => "POST"
        ];
        */
    }

    public function delete($uri, $controller) {
        return $this->add("DELETE", $uri, $controller);
        /*
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => "DELETE"
        ];
        */
    }

    public function patch($uri, $controller) {
        return $this->add("PATCH", $uri, $controller);
        /*
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => "PATCH"
        ];
        */
    }

    public function put($uri, $controller) {
        return $this->add("PUT", $uri, $controller);
        /*
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => "PUT"
        ];
        */
    }

    public function only($key) {
        $this->routes[array_key_last($this->routes)]["middleware"] = $key;
        
        return $this;
    }

    /*
    function routeToController($uri, $routes) {
        if (array_key_exists($uri, $routes)) {
            require base_path($routes[$uri]);
        } else {
            abort(Response::NOT_FOUND);
        }
    }
    */

    public function route($uri, $method) {
        foreach ($this->routes as $route) {
            if ($route["uri"] === $uri && $route["method"] === strtoupper($method)) {
                // Apply the middleware
                Middleware::resolve($route["middleware"]);

                /* Use this if resolve function is not to be used.
                if ($route["middleware"]) {
                    $middleware = Middleware::MAP[$route["middleware"]];
                    (new $middleware)->handle();
                }
                    */

                /*
                if ($route["middleware"] === "guest") {
                    (new Guest)->handle();
                }

                if ($route["middleware"] === "auth") {
                    (new Auth)->handle();
                }
                */

                return require base_path("Http/controllers/" . $route["controller"]);
            }
        }

        $this->abort();
    }

    public function abort($code = 404) {
        http_response_code($code);
    
        require base_path("views/{$code}.php");
    
        die();
    }
}