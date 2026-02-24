--TEST--
Test that extract() works on a variable after its readonly flag was removed by unset.
--FILE--
<?php

readonly $foo = "original";
unset($foo);

$data = [
    'foo' => 'new_value',
];

$count = extract($data);

echo "count: $count", PHP_EOL;
echo "foo: $foo", PHP_EOL;
?>
--EXPECT--
count: 1
foo: new_value
