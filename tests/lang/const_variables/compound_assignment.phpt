--TEST--
Test compound assignment operators on const variables.
--FILE--
<?php

const $number = 10;
const $string = "hello";

echo "Initial number: $number\n";
echo "Initial string: $string\n";

// Try compound assignment on number
$number += 5;
?>
--EXPECTF--
Initial number: 10
Initial string: hello

Fatal error: Uncaught Error: Cannot re-assign final variable. in %s:%d
Stack trace:
#0 {main}
  thrown in %s on line %d