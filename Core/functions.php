<?php

use Core\Response;
use Core\Router;

function dd($value) {
    echo "<pre>";
        var_dump($value); // can be an echo for an array
    echo "</pre>";

    die();
}

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if (!$condition) {
        $abort = new Router;
        $abort->abort($status);
    }
}

function base_path($path) {
    return BASE_PATH . $path;
    dd(base_path($path));
}

function view($path, $attribute = []) {
    extract($attribute);

    require base_path("views/" . $path);
}

function redirect($path) {
    header("location: {$path}");
    exit();
}

function old($key, $default = "") {
    return Core\Session::get("old")[$key] ?? $default;
}