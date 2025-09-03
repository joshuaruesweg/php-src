--TEST--
Test returning const variables from functions.
--FILE--
<?php

function get_const_value() {
    const $local_const = "function_value";
    return $local_const;
}

function modify_returned_value() {
    $returned = get_const_value();
    echo "Returned value: $returned\n";

    // Should be able to modify the returned copy
    $returned = "modified";
    echo "Modified returned: $returned\n";

    return $returned;
}

$result = modify_returned_value();
echo "Final result: $result\n";

// Test direct const variable return
const $main_const = 123;
$copy = $main_const;
$copy = 456; // Should work - it's a copy
echo "Copy: $copy\n";

// Original should still be immutable
$main_const = 789;
?>
--EXPECTF--
Returned value: function_value
Modified returned: modified
Final result: modified
Copy: 456

Fatal error: Uncaught Error: Cannot re-assign final variable. in %s:%d
Stack trace:
#0 {main}
  thrown in %s on line %d