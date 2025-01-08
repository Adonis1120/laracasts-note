<?php

$config = require "config.php";
$db = new Database($config["database"]);

$heading = "my notes";

$notes = $db->query("select * from notes where user_id = 1")->get();

require "views/notes/notes.view.php";