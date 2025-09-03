--TEST--
Test const variables as function parameters.
--FILE--
<?php

function test_function($param) {
    echo "Received parameter: $param\n";

    // Try to modify parameter (should work - it's a copy)
    $param = 999;
    echo "Modified parameter: $param\n";
}

const $const_value = 42;
echo "Original const: $const_value\n";

test_function($const_value);

echo "Const after function call: $const_value\n";

// Original const should still be immutable
$const_value = 100;
?>
--EXPECTF--
Original const: 42
Received parameter: 42
Modified parameter: 999
Const after function call: 42

Fatal error: Uncaught Error: Cannot re-assign final variable. in %s:%d
Stack trace:
#0 {main}
  thrown in %s on line %d