--TEST--
Test const and normal variables together.
--FILE--
<?php

const $const_var = 100;
$normal_var = 200;

echo "const_var: $const_var\n";
echo "normal_var: $normal_var\n";

// Normal variable should be modifiable
$normal_var = 300;
echo "modified normal_var: $normal_var\n";

// Const variable should not be modifiable
$const_var = 400;
?>
--EXPECTF--
const_var: 100
normal_var: 200
modified normal_var: 300

Fatal error: Uncaught Error: Cannot re-assign final variable. in %s:%d
Stack trace:
#0 {main}
  thrown in %s on line %d