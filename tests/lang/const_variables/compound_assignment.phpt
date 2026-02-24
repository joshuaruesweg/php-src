--TEST--
Test compound assignment operators on const variables.
--FILE--
<?php

readonly $number = 10;

echo "Initial number: $number", PHP_EOL;

try {
    $number += 5;
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
var_dump($number);
?>
--EXPECT--
Initial number: 10
Error: Cannot re-assign readonly variable.
int(10)
