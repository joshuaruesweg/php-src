--TEST--
Test string compound assignment on const variables.
--FILE--
<?php

readonly $text = "start";

echo "Initial text: $text", PHP_EOL;

try {
    $text .= "_end";
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
var_dump($text);
?>
--EXPECT--
Initial text: start
Error: Cannot re-assign readonly variable.
string(5) "start"
