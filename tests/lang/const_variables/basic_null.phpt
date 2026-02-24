--TEST--
Test basic null const variables.
--FILE--
<?php

readonly $test = null;
try {
    $test = 111;
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
// The variable has not changed.
var_dump($test);
?>
--EXPECT--
Error: Cannot re-assign readonly variable.
NULL
