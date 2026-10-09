<?php
declare(strict_types=1);
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

echo "EXERCISE 6 - Find the bugs\n";
echo "===========================\n\n";

// The worksheet contains five bugs in the original function:
// 1. The loop starts at 1, so request 0 is skipped.
// 2. The key is 'Status' instead of the correct lowercase 'status'.
// 3. '=' assigns a value; it should use '===' for comparison.
// 4. '$total + 1' calculates a value but does not store it.
// 5. The function has no return statement.
//
// Corrected version:
function count_pending_fixed(array $requests): int
{
    $total = 0;

    for ($i = 0; $i < count($requests); $i++) {
        $status = $requests[$i]['status'];

        if ($status === 'Submitted' || $status === 'Under review') {
            $total++;
        }
    }

    return $total;
}

echo "Pending requests: " . count_pending_fixed($requests) . "\n\n";

echo "Bug log:\n";
echo "1. First record skipped -> loop started at 1 -> start at 0.\n";
echo "2. Undefined array key 'Status' -> correct key is 'status'.\n";
echo "3. Assignment used in condition -> use === for comparison.\n";
echo "4. Counter was not updated -> use \$total++.\n";
echo "5. Function returned nothing -> add return \$total.\n";
