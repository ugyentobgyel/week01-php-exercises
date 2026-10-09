<?php
declare(strict_types=1);
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

echo "EXERCISE 1 - Predict the output\n";
echo "===============================\n\n";

// Snippet A
$x = 0;
$label = $x ?: 'none';
$size = $x ?? 'none';

echo "Snippet A:\n";
echo "$label | $size\n\n";

// Reason:
// ?: uses the truthiness of the value, so 0 is treated as false.
// ?? only uses the right side when the left side is null.
// Therefore the output is: none | 0

// Snippet B
$total = 0;

for ($i = 1; $i <= 10; $i++) {
    if ($i % 3 === 0) {
        continue;
    }

    if ($i > 7) {
        break;
    }

    $total += $i;
}

echo "Snippet B:\n";
echo "$total\n\n";

// Reason:
// 3 and 6 are skipped.
// When i becomes 8, the loop breaks.
// Added values are 1 + 2 + 4 + 5 + 7 = 19.

// Snippet C
$m = ['b' => 2, 'a' => 1, 'c' => 3];
$out = '';

foreach ($m as $k => $v) {
    $up = $v > 1;
    $out .= $up ? strtoupper($k) : $k;
}

echo "Snippet C:\n";
echo "$out\n\n";

// Reason:
// b has value 2 -> B
// a has value 1 -> a
// c has value 3 -> C
// Output: BaC

// Snippet D
$n = strlen(trim(' Paro '));

echo "Snippet D:\n";
echo $n . substr('Paro', -2) . "\n\n";

// Reason:
// trim(' Paro ') becomes 'Paro', which has 4 characters.
// substr('Paro', -2) gives 'ro'.
// Output: 4ro

echo "Expected answers:\n";
echo "A: none | 0\n";
echo "B: 19\n";
echo "C: BaC\n";
echo "D: 4ro\n";
