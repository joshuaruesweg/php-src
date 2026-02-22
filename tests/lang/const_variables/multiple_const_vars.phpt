--TEST--
Test multiple const variables in same scope.
--FILE--
<?php

readonly $first = 123;
readonly $second = "hello";
readonly $third = 3.14;

echo "first: $first", PHP_EOL;
echo "second: $second", PHP_EOL;
echo "third: $third", PHP_EOL;


try {
    // Try to modify first const variable
    $first = 999;
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
?>
--EXPECT--
first: 123
second: hello
third: 3.14
Error: Cannot re-assign readonly variable.
