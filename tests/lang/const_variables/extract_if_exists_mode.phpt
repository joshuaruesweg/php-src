--TEST--
Test that extract() with EXTR_IF_EXISTS fails on readonly variables.
--FILE--
<?php

readonly $foo = "original";
$bar = "normal";

$data = [
    'foo' => 'overwritten',
    'bar' => 'overwritten',
];

try {
    extract($data, EXTR_IF_EXISTS);
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

echo "foo: $foo", PHP_EOL;
echo "bar: $bar", PHP_EOL;
?>
--EXPECT--
Error: Cannot re-assign readonly variable.
foo: original
bar: normal
