--TEST--
Test readonly variable declared inside if-block persists in outer scope.
--FILE--
<?php

if (true) {
    readonly $variable = "global_value";
}

try {
    $variable = false;
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
?>
--EXPECT--
Error: Cannot re-assign readonly variable.
