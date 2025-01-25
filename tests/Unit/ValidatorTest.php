<?php

// Run it with "pest tests/Unit/ValidatorTest.php" in the terminal
// If "pest tests/Unit/ValidatorTest.php" don't work because the pest is not recornize and not accessible globally in your terminal,
// Then run "vendor\bin\pest tests/Unit/ValidatorTest.php" to use locally the installed pest and run the specified test.

it("validates a string", function () {
    expect(\Core\Validator::string("foobar"))->toBeTrue();
    /*
    $result = \Core\Validator::string("foobar");
    expect($result)->toBeTrue();    // same as expect($result)->toBe(true);
    */

    expect(\Core\Validator::string(false))->toBeFalse();
    expect(\Core\Validator::string(""))->toBeFalse();
});

it("validates a string with a minimum length", function () {
    expect(\Core\Validator::string("foobar", 20))->toBeFalse();
});

it("validates an email", function () {
    expect(\Core\Validator::email("foobar"))->toBeFalse();

    expect(\Core\Validator::email("foobar@example.com"))->toBeTrue();
    // To make the test passed, make the email validation to return try.
    // In the Validator.php, change the return with "return (bool) filter_var($value, FILTER_VALIDATE_EMAIL);"
    // or the other way on making it boolean by restricting it in the function. "public static function email(string $value): bool".
});