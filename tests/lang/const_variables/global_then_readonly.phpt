--TEST--
Test that global statement is forbidden with const variables.
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
?>
--EXPECT--

