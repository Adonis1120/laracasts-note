<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST["email"];
$password = $_POST["password"];

// Validate form inputs
$errors = [];

if (!Validator::email($email)) {
    $errors["email"] = "Please provide a valid email address.";
}

if (!Validator::string($password)) {
    $errors["password"] = "Please provide a valid password.";
}

if (!empty($errors)) {
    return view("session/create.view.php",[
        "errors" => $errors
    ]);
}

// Match the credentials
$user = $db->query("SELECT * FROM users WHERE email = :email", [
    "email" => $email
])->find();

if (!$user) {
    return view("session/create.view.php", [
        "errors" => [
            "email" => "No account found with that email address."
        ]
    ]);
}

// Account exists but password won't match
if (password_verify($password, $user["password"])) {
    // Make a session
    login([
        "email" => $email
    ]);

    // Logged the user in
    header("location: /");
    exit();
}

return view("session/create.view.php", [
    "errors" => [
        "password" => "The email and password you entered don't match."
    ]
]);