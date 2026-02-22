--TEST--
Test alternative increment operations on const variables.
--FILE--
<?php

readonly $counter = 5;

echo "Initial counter: $counter\n", PHP_EOL;

try {
    $counter += 1;
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
?>
--EXPECT--
Initial counter: 5

Error: Cannot re-assign readonly variable.
