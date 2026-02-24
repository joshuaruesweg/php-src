--TEST--
Test array const variables.
--FILE--
<?php
readonly $arr = [1, 2, 3];
echo "Original array: ";
print_r($arr);

try {
    $arr[0] = 999;
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

try {
    $arr[] = 999;
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

try {
    array_push($arr, 999);
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
?>
--EXPECT--
Original array: Array
(
    [0] => 1
    [1] => 2
    [2] => 3
)
Error: Cannot re-assign readonly variable.
Error: Cannot re-assign readonly variable.
Error: Cannot pass readonly variable by reference