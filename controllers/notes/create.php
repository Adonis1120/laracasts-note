<?php

require "Validator.php";

$config = require "config.php";
$db = new Database($config["database"]);

$heading = "create note";

if (!Validator::email("aimperial@gmail.com")) {
    dd("Not a valid email.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    if (!Validator::string(($_POST["body"]), 1, 255)) {
        $errors["body"] = "The body must be at least 1 character and not exceed 255 characters.";
    }

    if (empty($errors)) {
        $db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id)", [
            "body" => $_POST["body"],
            "user_id" => 1
        ]);
    }
}

require "views/notes/note-create.view.php";