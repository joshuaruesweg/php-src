--TEST--
Test that extract() cannot overwrite readonly variables.
--FILE--
<?php

readonly $foo = "bar";
readonly $baz = "qux";

$data = [
    'foo' => 'overwritten',
    'baz' => 'overwritten',
    'new_var' => 'hello',
];

try {
    extract($data);
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

echo $foo, PHP_EOL;
echo $baz, PHP_EOL;
var_dump(isset($new_var));
?>
--EXPECT--
Error: Cannot re-assign readonly variable.
bar
qux
bool(false)
