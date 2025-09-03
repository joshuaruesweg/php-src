--TEST--
Test alternative increment operations on const variables.
--FILE--
<?php

const $counter = 5;

echo "Initial counter: $counter\n";

// Try += 1 instead of ++
$counter += 1;
?>
--EXPECTF--
Initial counter: 5

Fatal error: Uncaught Error: Cannot re-assign final variable. in %s:%d
Stack trace:
#0 {main}
  thrown in %s on line %d