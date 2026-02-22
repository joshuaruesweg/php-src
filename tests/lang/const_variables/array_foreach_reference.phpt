--TEST--
Test that foreach by reference is forbidden on readonly array variables.
--FILE--
<?php
readonly $arr = [1, 2, 3];

foreach ($arr as &$v) {
    $v = 111;
}
?>
--EXPECTF--
Fatal error: Uncaught Error: Cannot iterate over readonly variable by reference in %s:%d
Stack trace:
#0 {main}
  thrown in %s on line %d
