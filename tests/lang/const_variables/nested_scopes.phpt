--TEST--
Test const variables in nested scopes.
--FILE--
<?php
readonly $outer = 10;

function testFunction() {
    readonly $inner = 20;
    echo "Inner const: ", $inner, PHP_EOL;

    // Try to modify inner const
    $inner = 30;
    echo "Modified inner: ", $inner, PHP_EOL;
}
echo "Outer const: ", $outer, PHP_EOL;

try {
    testFunction();
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
?>
--EXPECT--
Outer const: 10
Inner const: 20
Error: Cannot re-assign readonly variable.
