--TEST--
Test that extract() respects readonly variables inside a function scope.
--FILE--
<?php

function test_extract_overwrite() {
    readonly $x = 10;

    $data = ['x' => 99, 'y' => 42];

    try {
        extract($data);
    } catch (Throwable $e) {
        echo $e::class, ": ", $e->getMessage(), PHP_EOL;
    }

    echo "x: $x", PHP_EOL;
    var_dump(isset($y));
}

function test_extract_no_conflict() {
    readonly $x = 10;

    $data = ['y' => 42, 'z' => 99];

    $count = extract($data);

    echo "count: $count", PHP_EOL;
    echo "x: $x", PHP_EOL;
    echo "y: $y", PHP_EOL;
    echo "z: $z", PHP_EOL;
}

test_extract_overwrite();
test_extract_no_conflict();
?>
--EXPECT--
Error: Cannot re-assign readonly variable.
x: 10
bool(false)
count: 2
x: 10
y: 42
z: 99
