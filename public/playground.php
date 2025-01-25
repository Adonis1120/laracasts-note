<?php

use Illuminate\Support\Collection;

require __DIR__ . "/../vendor/autoload.php";

$numbers = new Collection([
    1, 2, 3, 4, 5, 6, 7, 8, 9, 10
]);

$oneToFive = $numbers->filter(function ($number) {
    return $number <= 5;
});

var_dump($oneToFive);

if ($numbers->contains(10)) {
    die("it contains ten");
}

// This file is for testing purposes for Collections
// Run this file with "php public/playground.php" into the terminal to test the result. 