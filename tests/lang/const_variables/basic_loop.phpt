--TEST--
Test basic loop with const variables.
--FILE--
<?php
foreach ([1, 2] as $a) {
    const $b = $a;
}
?>
--EXPECTF--
Fatal error: Uncaught Error: Cannot re-assign final variable. in %s:%d
Stack trace:
#0 {main}
  thrown in %s on line %d
