--TEST--
Test that extract() with readonly conflict does not create any new variables (all-or-nothing).
--FILE--
<?php

readonly $existing = "protected";

$data = [
    'alpha' => 'first',
    'beta' => 'second',
    'existing' => 'overwritten',
    'gamma' => 'third',
];

try {
    extract($data);
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

echo "existing: $existing", PHP_EOL;
var_dump(isset($alpha));
var_dump(isset($beta));
var_dump(isset($gamma));
?>
--EXPECT--
Error: Cannot re-assign readonly variable.
existing: protected
bool(false)
bool(false)
bool(false)
