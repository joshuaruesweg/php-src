--TEST--
Test string compound assignment on const variables.
--FILE--
<?php

const $text = "start";

echo "Initial text: $text\n";

// Try string concatenation assignment
$text .= "_end";
?>
--EXPECTF--
Initial text: start

Fatal error: Uncaught Error: Cannot re-assign final variable. in %s:%d
Stack trace:
#0 {main}
  thrown in %s on line %d