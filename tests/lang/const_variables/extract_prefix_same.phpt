--TEST--
Test that extract() with EXTR_PREFIX_SAME does not trigger readonly error.
--FILE--
<?php

readonly $foo = "original";

$data = [
    'foo' => 'overwritten',
    'new_var' => 'hello',
];

$count = extract($data, EXTR_PREFIX_SAME, "pre");

echo "count: $count", PHP_EOL;
echo "foo: $foo", PHP_EOL;
echo "pre_foo: $pre_foo", PHP_EOL;
echo "new_var: $new_var", PHP_EOL;
?>
--EXPECT--
count: 2
foo: original
pre_foo: overwritten
new_var: hello
