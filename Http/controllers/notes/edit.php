<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$current_user_id = 1;

$note = $db->query("select * from notes where id = :id", [
    "id" => $_GET["id"]
])->findOrFail();

authorize($note["user_id"] === $current_user_id);

view("notes/edit.view.php", [
    "heading" => "edit note",
    "errors" => [],
    "note" => $note
]);