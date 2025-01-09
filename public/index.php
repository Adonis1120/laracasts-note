<?php

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function($class) {
    // Translate Core\Database (the "\" is caused by the namespace) to Core/Database
    //require base_path("Core/{$class}.php");
    $class = str_replace("\\", "/", $class);
    require base_path("{$class}.php");
});

require base_path("Core/router.php");

/* This part is working but we removed the required path below to let the spl_autoload_register handle it instead.
require base_path("Database.php");
require base_path("Response.php");
*/