--TEST--
Test that extract() fails when multiple readonly variables would be overwritten.
--FILE--
<?php

readonly $a = "one";
readonly $b = "two";
readonly $c = "three";

$data = [
    'a' => 'x',
    'b' => 'y',
    'c' => 'z',
];

try {
    extract($data);
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

echo "a: $a", PHP_EOL;
echo "b: $b", PHP_EOL;
echo "c: $c", PHP_EOL;
?>
--EXPECT--
Error: Cannot re-assign readonly variable.
a: one
b: two
c: three
