--TEST--
Test array const variables.
--FILE--
<?php
const $arr = [1, 2, 3];
echo "Original array: ";
print_r($arr);

// Try to modify array element
$arr[0] = 999;
echo "Modified array: ";
print_r($arr);
?>
--EXPECTF--
Original array: Array
(
    [0] => 1
    [1] => 2
    [2] => 3
)

Fatal error: Uncaught Error: Cannot re-assign final variable. in %s:%d
Stack trace:
#0 {main}
  thrown in %s on line %d