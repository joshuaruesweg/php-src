--TEST--
Test basic const variables.
--FILE--
<?php

const $test = 123;
$test = 111;
?>
--EXPECTF--
Fatal error: Uncaught Error: Cannot re-assign final variable. in %s:%d
Stack trace:
#0 {main}
  thrown in %s on line %d
