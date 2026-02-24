--TEST--
Test that readonly variables captured by closures cannot be re-assigned via compound assignment operators.
--FILE--
<?php

readonly $number = 10;

$fn = function () use ($number) {
    echo "Initial number: $number", PHP_EOL;

    try {
        $number += 5;
    } catch (Throwable $e) {
        echo $e::class, ": ", $e->getMessage(), PHP_EOL;
    }
    var_dump($number);
};

$fn();
var_dump($number);
?>
--EXPECT--
Initial number: 10
Error: Cannot re-assign readonly variable.
int(10)
int(10)
