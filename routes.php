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

$router->get("/", "controllers/index.php");
$router->get("/about", "controllers/about.php");
$router->get("/contact", "controllers/contact.php");

$router->get("/notes", "controllers/notes/index.php");
$router->get("/note", "controllers/notes/show.php");
$router->delete("/note", "controllers/notes/destroy.php");

$router->get("/note/create", "controllers/notes/create.php");
$router->post("/notes", "controllers/notes/store.php");