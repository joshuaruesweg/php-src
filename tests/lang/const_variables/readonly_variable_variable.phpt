--TEST--
Test that variable variables are forbidden with readonly variables.
--FILE--
<?php

readonly $foo = "bar";
$name = "foo";

echo "Before: $foo\n";

try {
    $$name = "baz";
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

echo "After: $foo\n";
?>
--EXPECT--
Before: bar
Error: Cannot re-assign readonly variable.
After: bar
