<?php

/*
return [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/notes' => 'controllers/notes/index.php',
    '/note' => 'controllers/notes/show.php',
    '/note/create' => 'controllers/notes/create.php',
    '/contact' => 'controllers/contact.php'
];
*/
// Transforming this routes to a more complex array. And instead of just an array, making it a class to access it dynamically with the RESTful approach

/*
The instantiated code after this commented section will create more complex array as the array below.
It's a substitute on the commented array above for more dynamic routing especially when routing other requests like get, post, delete and more.

return [
    [
        "uri" => "/",
        "controller" => "controllers/index.php"
        "method" => "GET"
    ],
    [
        "uri" => "/note",
        "controller" => "controllers/notes/show.php",
        "method" => "GET"
    ],
    [
        "uri" => "/note",
        "controller" => "controllers/notes/destroy.php",
        "method" => "DELETE"
    ]
*/

$router->get("/", "index.php");
$router->get("/about", "about.php");
$router->get("/contact", "contact.php");

$router->get("/notes", "notes/index.php")->only("auth");
$router->get("/note", "notes/show.php");
$router->delete("/note", "notes/destroy.php");

$router->get("/note/edit", "notes/edit.php");
$router->patch("/note", "notes/update.php");

$router->get("/note/create", "notes/create.php");
$router->post("/notes", "notes/store.php");

$router->get("/register", "registration/create.php")->only("guest");
$router->post("/register", "registration/store.php")->only("guest");

$router->get("/login", "session/create.php")->only("guest");
$router->post("/session", "session/store.php")->only("guest");
$router->delete("/session", "session/destroy.php")->only("auth");