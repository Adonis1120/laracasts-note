<?php

/*
This container file was made for testing the class container through PHP Pest.
The code below is to run and test codes in the container especially when alter.
So, run "vendor\bin\pest" in the terminal to test the container class or file especially when modified.
It will check the changes if doesn't affect other codes who used it.
*/

namespace Core;

class Container {
    public $bindings = [];

    public function bind($key, $resolver) {    // add
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key) { // remove
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching binding found for {$key}.");
        }

        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }
}