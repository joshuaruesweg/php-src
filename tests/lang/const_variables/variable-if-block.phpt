--TEST--
Test that global statement is forbidden with const variables.
--FILE--
<?php

if (true) {
    readonly $variable = "global_value";
}

try {
    $variable = false;
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
?>
--EXPECT--
Error: Cannot re-assign readonly variable.
