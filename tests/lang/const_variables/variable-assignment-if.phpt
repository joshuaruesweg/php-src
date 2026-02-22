--TEST--
Test that global statement is forbidden with const variables.
--FILE--
<?php

readonly $foo = "bar", $bar = "foo";

try {
    $foo = "changed";
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
try {
    $bar = "changed";
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
?>
--EXPECT--
Error: Cannot re-assign readonly variable.
Error: Cannot re-assign readonly variable.
