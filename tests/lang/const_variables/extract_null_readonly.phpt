--TEST--
Test that extract() cannot overwrite a readonly variable that holds null.
--FILE--
<?php

readonly $foo = null;

$data = [
    'foo' => 'new_value',
    'other' => 'hello',
];

try {
    extract($data);
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

var_dump($foo);
var_dump(isset($other));
?>
--EXPECT--
Error: Cannot re-assign readonly variable.
NULL
bool(false)
