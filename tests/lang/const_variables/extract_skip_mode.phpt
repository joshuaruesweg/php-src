--TEST--
Test that extract() with EXTR_SKIP does not trigger readonly error.
--FILE--
<?php

readonly $foo = "original";
$bar = "normal";

$data = [
    'foo' => 'overwritten',
    'bar' => 'overwritten',
    'new_var' => 'hello',
];

$count = extract($data, EXTR_SKIP);

echo "count: $count", PHP_EOL;
echo "foo: $foo", PHP_EOL;
echo "bar: $bar", PHP_EOL;
echo "new_var: $new_var", PHP_EOL;
?>
--EXPECT--
count: 1
foo: original
bar: normal
new_var: hello
