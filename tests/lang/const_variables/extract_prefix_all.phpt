--TEST--
Test that extract() with EXTR_PREFIX_ALL does not conflict with readonly variables.
--FILE--
<?php

readonly $foo = "original";

$data = [
    'foo' => 'overwritten',
    'bar' => 'hello',
];

$count = extract($data, EXTR_PREFIX_ALL, "pre");

echo "count: $count", PHP_EOL;
echo "foo: $foo", PHP_EOL;
echo "pre_foo: $pre_foo", PHP_EOL;
echo "pre_bar: $pre_bar", PHP_EOL;
?>
--EXPECT--
count: 2
foo: original
pre_foo: overwritten
pre_bar: hello
