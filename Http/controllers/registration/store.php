<?php

use Core\Validator;
use Core\App;
use Core\Database;

$email = $_POST["email"];
$password = $_POST["password"];

// Validate form inputs
$errors = [];

if (!Validator::email($email)) {
    $errors["email"] = "Please provide a valid email address.";
}

if (!Validator::string($password, 7, 25)) {
    $errors["password"] = "Please provide a password between 7 and 25 characters.";
}

if (!empty($errors)) {
    return view("registration/create.view.php",[
        "errors" => $errors
    ]);
}

$db = App::resolve(Database::class);

// Check if the account already exists
$user = $db->query("SELECT * FROM users WHERE email = :email", [
    "email" => $email
])->find();

// If true or yes, redirect back to the login page
// If false or no, save to the database then log the user in and redirect
if ($user) {    // True coz email already exists
    header("location: /login");  // Change to login later
} else {    // False. So save and log the user in
    $db->query("INSERT INTO users(email, password) VALUES(:email, :password)", [
        "email" => $email,
        "password" => password_hash($password, PASSWORD_BCRYPT)
    ]);

    // Mark that the user has logged in using session
    login($user);

    header("location: /");
    exit();
}