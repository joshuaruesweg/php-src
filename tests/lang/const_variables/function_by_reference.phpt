--TEST--
Test compound assignment operators on const variables.
--FILE--
<?php

const $const = 10;

function test(&$var) {
    $var = 123;
}

test($const);

echo $const;
?>
--EXPECTF--
Fatal error: Uncaught Error: Cannot re-assign final variable. in %s:%d
Stack trace:
#0 {main}
  thrown in %s on line %d
