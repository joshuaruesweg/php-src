--TEST--
Test that passing readonly variables by reference is forbidden.
--FILE--
<?php

readonly $const = 10;

function test(&$var) {
    echo $var;
}

try {
    test($const);
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
?>
--EXPECT--
Error: Cannot pass readonly variable by reference
