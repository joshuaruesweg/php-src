--TEST--
Test that combining static and readonly on the same variable is forbidden.
--FILE--
<?php

function test_readonly_then_static() {
    readonly $x = 5;
    static $x = 0;
}

try {
    test_readonly_then_static();
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
?>
--EXPECTF--
Fatal error: Cannot use static with readonly variable "x" in %s on line %d
