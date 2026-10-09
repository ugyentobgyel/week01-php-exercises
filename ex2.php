<?php
declare(strict_types=1);
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

echo "EXERCISE 2 - Busiest Dzongkhag\n";
echo "==============================\n\n";

$counts = [];

// Count only pending requests.
// Pending means Submitted or Under review.
foreach ($requests as $r) {
    if ($r['status'] === 'Submitted' || $r['status'] === 'Under review') {
        $dzongkhag = ucwords(strtolower(trim($r['dzongkhag'])));

        if (!isset($counts[$dzongkhag])) {
            $counts[$dzongkhag] = 0;
        }

        $counts[$dzongkhag]++;
    }
}

// Find the highest count without max().
$highest = 0;

foreach ($counts as $count) {
    if ($count > $highest) {
        $highest = $count;
    }
}

// Print every Dzongkhag that has the highest count.
$winners = [];

foreach ($counts as $dzongkhag => $count) {
    if ($count === $highest) {
        $winners[] = $dzongkhag;
    }
}

echo "Busiest: " . implode(', ', $winners) . " ($highest pending)\n";
