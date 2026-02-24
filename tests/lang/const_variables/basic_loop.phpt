--TEST--
Test basic loop with const variables.
--FILE--
<?php
foreach ([1, 2] as $a) {
    try {
	    readonly $b = $a;
	} catch (Throwable $e) {
	    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
	}
}
?>
--EXPECT--
Error: Cannot re-assign readonly variable.
