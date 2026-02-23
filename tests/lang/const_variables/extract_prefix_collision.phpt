--TEST--
Test that extract() with EXTR_PREFIX_SAME fails when prefixed name collides with readonly variable.
--FILE--
<?php

readonly $pre_foo = "protected";
readonly $foo = "original";

$data = [
    'foo' => 'overwritten',
];

try {
    $count = extract($data, EXTR_PREFIX_SAME, "pre");
    echo "count: $count", PHP_EOL;
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

echo "foo: $foo", PHP_EOL;
echo "pre_foo: $pre_foo", PHP_EOL;
?>
--EXPECT--
Error: Cannot re-assign readonly variable.
foo: original
pre_foo: protected
