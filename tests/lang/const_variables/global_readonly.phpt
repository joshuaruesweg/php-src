--TEST--
Test that global statement is forbidden with const variables.
--FILE--
<?php

readonly $global_const = "global_value";

function test_global() {
    global $global_const;
}

echo "Before function: $global_const\n";

try {
    test_global();
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
?>
--EXPECT--
Before function: global_value
Error: Cannot use global with readonly variable "global_const"
