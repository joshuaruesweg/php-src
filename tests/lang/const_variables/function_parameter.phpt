--TEST--
Test const variables as function parameters.
--FILE--
<?php

function test_function($param) {
    echo "Received parameter: $param", PHP_EOL;

    // Try to modify parameter (should work - it's a copy)
    $param = 999;
    echo "Modified parameter: $param", PHP_EOL;
}

readonly $const_value = 42;
echo "Original const: $const_value", PHP_EOL;

test_function($const_value);

echo "Const after function call: $const_value", PHP_EOL;

try {
    $const_value = 100;
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
?>
--EXPECT--
Original const: 42
Received parameter: 42
Modified parameter: 999
Const after function call: 42
Error: Cannot re-assign readonly variable.
