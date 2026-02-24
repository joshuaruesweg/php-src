--TEST--
Test that increment on readonly variables is forbidden.
--FILE--
<?php

readonly $test = 123;
try {
    $test++;
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
?>
--EXPECT--
Error: Cannot re-assign readonly variable.
