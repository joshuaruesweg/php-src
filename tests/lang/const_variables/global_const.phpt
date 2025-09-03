--TEST--
Test global const variables.
--FILE--
<?php

const $global_const = "global_value";

function test_global() {
    global $global_const;
    echo "Inside function: $global_const\n";
    
    // Try to modify global const
    $global_const = "modified_global";
}

echo "Before function: $global_const\n";
test_global();
?>
--EXPECTF--
Before function: global_value
Inside function: global_value
Fatal error: Uncaught Error: Cannot re-assign final variable. in %s:%d
Stack trace:
#0 test_global()
#1 {main}
  thrown in %s on line %d