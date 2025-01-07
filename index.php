<?php

require "functions.php";
require "Database.php";
require "Response.php";
require "router.php";

/* comment the require "router.php" to make this work or put it on top of it. You can also put it on controller like notes.php
$config = require "config.php";
$db = new Database($config["database"]);

$id = $_GET['id'];
$query = "select * from posts where id = ?";

$posts = $db->query($query, [$id])->fetch(PDO::FETCH_ASSOC);    // The ->fetch(PDO::FETCH_ASSOC) was used at the time the fetch() was not yet set in the Database.php

dd($posts);

foreach ($posts as $post) {
    echo "<li>" . $post["title"] . "</li>";
}
*/