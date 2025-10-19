--TEST--
Test that global statement is forbidden with const variables.
--FILE--
<?php

const $global_const = "global_value";

function test_global() {
    global $global_const;
    echo "Should not reach here\n";
}

echo "Before function: $global_const\n";
test_global();
?>
--EXPECTF--
Before function: global_value

Fatal error: Uncaught Error: Cannot use global with const variable "global_const" in %s:%d
Stack trace:
#0 %s(%d): test_global()
#1 {main}
  thrown in %s on line %d
