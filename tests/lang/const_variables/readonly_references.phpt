--TEST--
Test const variables as function parameters.
--FILE--
<?php

$a = 1;
readonly $b = &$a;
$a = 2;
?>
--EXPECTF--
Parse error: syntax error, unexpected token "&" in %s on line %d
