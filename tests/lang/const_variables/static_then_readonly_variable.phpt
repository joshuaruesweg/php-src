--TEST--
Test that declaring readonly on an already static variable is forbidden.
--FILE--
<?php

function test_static_then_readonly() {
    static $x = 0;
    readonly $x = 5;
}

try {
    test_static_then_readonly();
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
?>
--EXPECTF--
Fatal error: Cannot use readonly with static variable "x" in %s on line %d
