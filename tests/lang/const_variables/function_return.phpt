--TEST--
Test returning const variables from functions.
--FILE--
<?php

function get_const_value() {
    readonly $local_const = "function_value";
    return $local_const;
}

function modify_returned_value() {
    $returned = get_const_value();
    echo "Returned value: $returned", PHP_EOL;

    // Should be able to modify the returned copy
    $returned = "modified";
    echo "Modified returned: $returned", PHP_EOL;

    return $returned;
}

$result = modify_returned_value();
echo "Final result: $result", PHP_EOL;

// Test direct const variable return
readonly $main_const = 123;
$copy = $main_const;
$copy = 456; // Should work - it's a copy
echo "Copy: $copy\n";

try {
    $main_const = 789;
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
?>
--EXPECT--
Returned value: function_value
Modified returned: modified
Final result: modified
Copy: 456
Error: Cannot re-assign readonly variable.
