--TEST--
Test readonly variable in unreachable if(false)-block does not affect outer scope.
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
