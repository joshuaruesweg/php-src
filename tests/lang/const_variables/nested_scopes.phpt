--TEST--
Test const variables in nested scopes.
--FILE--
<?php
const $outer = 10;

function testFunction() {
    const $inner = 20;
    echo "Inner const: " . $inner . "\n";
    
    // Try to modify inner const
    $inner = 30;
    echo "Modified inner: " . $inner . "\n";
}

echo "Outer const: " . $outer . "\n";
testFunction();
?>
--EXPECTF--
Outer const: 10
Inner const: 20

Fatal error: Uncaught Error: Cannot re-assign final variable. in %s:%d
Stack trace:
#0 %s(%d): testFunction()
#1 {main}
  thrown in %s on line %d
