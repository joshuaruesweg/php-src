--TEST--
Test that unset removes readonly flag from variable.
--FILE--
<?php

readonly $test = 123;
unset($test);
var_dump(isset($test));
$test = 111;
$test = 222;
var_dump($test);
?>
--EXPECT--
bool(false)
int(222)
