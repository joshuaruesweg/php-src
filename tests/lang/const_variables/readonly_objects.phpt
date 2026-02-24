--TEST--
Test objects in readonly variables.
--FILE--
<?php
readonly $obj = new stdClass();
$obj->value = "changed";
$obj->value = "changed again";
try {
    $obj = new stdClass();
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
?>
--EXPECT--
Error: Cannot re-assign readonly variable.
