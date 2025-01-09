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
// Transforming this routes to an array. And instead of just an array, making it a class to access it dynamically with the RESTful approach

$router->get("/", "controllers/index.php");
$router->get("/about", "controllers/about.php");
$router->get("/notes", "controllers/notes/index.php");
$router->get("/note", "controllers/notes/show.php");
$router->get("/note/create", "controllers/notes/create.php");
$router->get("/contact", "controllers/contact.php");
$router->delete("/note", "controllers/notes/destroy.php");