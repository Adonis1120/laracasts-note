<?php

use Core\Database;
use Core\Validator;
use Core\App;

$db = App::resolve(Database::class);

$current_user_id = 1;

// Find the corresponding note
$note = $db->query("select * from notes where id = :id", [
    "id" => $_POST["id"]
])->findOrFail();

// Authorize that the user can only the one to edit the note
authorize($note["user_id"] === $current_user_id);

// Validate the form
$errors = [];

if (!Validator::string(($_POST["body"]), 1, 255)) {
    $errors["body"] = "The body must be at least 1 character and not exceed 255 characters.";
}

// If no validation error, update the form
if (count($errors)) {
    view("notes/edit.view.php", [
        "heading" => "edit note",
        "errors" => $errors,
        "note" => $note
    ]);

    exit();
}

$db->query("UPDATE notes SET body = :body WHERE id = :id AND user_id = :user_id", [
    "body" => $_POST["body"],
    "user_id" => $current_user_id,
    "id" => $_POST["id"]
]);

// Redirect the user
header("location: /notes");
die();