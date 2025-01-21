<?php

use Core\App;
use Core\Database;

if (!$_SESSION["user"] ?? false) {
    header("location: /");
    exit();
}

/* Use this if you don't use bootstrap.php, Container.php and App.php
//$config = require base_path("config.php");
//$db = new Database($config["database"]);
*/

/* Use this method chaining if you used bootstrap.php, Container.php and App.php but no function resolve in App.php. Cause it just delegates it in the Container class.
//$db = App::container()->resolve("Core\Database"); OR $db = App::container()->resolve(Database::class); IF use Core\Database above;
*/

// Shorter for $db = App::container()->resolve("Database::class"); by creating resolve function in the App class to do the container()->resolve() by delegating it.
$db = App::resolve(Database::class);

$notes = $db->query("select * from notes where user_id = 1")->get();

view("notes/index.view.php", [
    "heading" => "my notes",
    "notes" => $notes
]);