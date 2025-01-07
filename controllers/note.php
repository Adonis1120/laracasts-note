<?php

$config = require "config.php";
$db = new Database($config["database"]);

$heading = "note";
$current_user_id = 1;

$note = $db->query("select * from notes where id = :id", [
    "id" => $_GET["id"]
])->findOrFail();

authorize($note["user_id"] === $current_user_id);

require "views/note.view.php";