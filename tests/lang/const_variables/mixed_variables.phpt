--TEST--
Test const and normal variables together.
--FILE--
<?php

readonly $const_var = 100;
$normal_var = 200;

echo "const_var: $const_var", PHP_EOL;
echo "normal_var: $normal_var", PHP_EOL;

// Normal variable should be modifiable
$normal_var = 300;
echo "modified normal_var: $normal_var", PHP_EOL;

try {
    // Const variable should not be modifiable
    $const_var = 400;
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
?>
--EXPECT--
const_var: 100
normal_var: 200
modified normal_var: 300
Error: Cannot re-assign readonly variable.
