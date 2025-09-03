--TEST--
Test multiple const variables in same scope.
--FILE--
<?php

const $first = 123;
const $second = "hello";
const $third = 3.14;

echo "first: $first\n";
echo "second: $second\n";
echo "third: $third\n";

// Try to modify first const variable
$first = 999;
?>
--EXPECTF--
first: 123
second: hello
third: 3.14

Fatal error: Uncaught Error: Cannot re-assign final variable. in %s:%d
Stack trace:
#0 {main}
  thrown in %s on line %d