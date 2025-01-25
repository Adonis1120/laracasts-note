<?php

/*
This container file was made for testing the class container through PHP Pest.
The code below is to run and test codes in the container especially when alter.
So, run "vendor\bin\pest" in the terminal to test the container class or file especially when modified.
It will check the changes if doesn't affect other codes who used it.
*/

use Core\Container;

test('it can resolve something out of the container', function () {
    // arrange
    $container = new Container();

    $container->bind("foo", function () {
        return "bar";
    }); // can also use the shortcut; $container->bind("foo", fn() => "foo");

    // act
    $result = $container->resolve("foo");

    // assert/expect
    expect($result)->toEqual("bar");
});