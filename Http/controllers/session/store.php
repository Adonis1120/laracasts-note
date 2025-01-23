<?php

use Http\Forms\LoginForm;
use Core\Authenticator;

// Validate form inputs
$form = LoginForm::validate($atrributes = [
    "email" => $_POST["email"],
    "password" => $_POST["password"]
]);

// Match the credentials
$signed_in = (new Authenticator)->attempt($attributes["email"], $attributes["password"]);

if (!$signed_in) {
    $form->error("email", "No matching account for that email and password.")->throw();
}

redirect("/");