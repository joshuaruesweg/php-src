--TEST--
Test that global statement is forbidden with const variables.
--FILE--
<?php

if (false) {
    readonly $variable = "global_value";
}

$variable = "string";
var_dump($variable);
?>
--EXPECT--
string(6) "string"
