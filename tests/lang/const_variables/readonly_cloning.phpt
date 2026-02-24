--TEST--
Test clone behavior with readonly variables.
--FILE--
<?php

class Foo {
    public string $value;

    public function __construct(string $value) {
        $this->value = $value;
    }
}

readonly $foo = new Foo("bar");
$clone = clone $foo;
echo "Clone value: ", $clone->value, PHP_EOL;

try {
    $foo = clone $foo;
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

readonly $bar = clone $foo;
echo "Readonly clone value: " . $bar->value, PHP_EOL;

try {
    $bar = "new value";
} catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}
?>
--EXPECT--
Clone value: bar
Error: Cannot re-assign readonly variable.
Readonly clone value: bar
Error: Cannot re-assign readonly variable.