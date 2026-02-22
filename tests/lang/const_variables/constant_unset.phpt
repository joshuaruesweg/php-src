--TEST--
Test that unset removes readonly flag from variable.
--FILE--
<?php

readonly $test = 123;
unset($test);
$test = 111;
$test = 222;
var_dump($test);
?>
--EXPECT--
int(222)
