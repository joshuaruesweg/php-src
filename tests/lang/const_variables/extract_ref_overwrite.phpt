--TEST--
Test that extract() with EXTR_REFS fails on readonly variables.
--FILE--
<?php

readonly $foo = "original";

$data = [
    'foo' => 'overwritten',
    'new_var' => 'hello',
];

try {
    extract($data, EXTR_REFS);
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

echo "foo: $foo", PHP_EOL;
var_dump(isset($new_var));
?>
--EXPECT--
Error: Cannot re-assign readonly variable.
foo: original
bool(false)
