--TEST--
Test that declaring readonly on a global (reference) variable is forbidden.
--FILE--
<?php
$global_const = "global_value";

function test_global() {
    global $global_const;

    try {
        readonly $global_const = "inner_value";
    } catch (Throwable $e) {
        echo $e::class, ": ", $e->getMessage(), PHP_EOL;
    }
}

test_global();
var_dump($global_const);
?>
--EXPECT--
Error: Cannot declare reference variable as readonly.
string(12) "global_value"
