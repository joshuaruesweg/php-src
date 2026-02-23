--TEST--
Test that taking a reference of a readonly variable is forbidden.
--FILE--
<?php

readonly $a = 1;

try {
    $b = &$a;
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

echo $a, PHP_EOL;
var_dump(isset($b));
?>
--EXPECT--
Error: Cannot take reference of readonly variable.
1
bool(false)
