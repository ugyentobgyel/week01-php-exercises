<?php
declare(strict_types=1);
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

echo "EXERCISE 4 - Waiting-time alert\n";
echo "===============================\n\n";

$today = '2026-10-07';

$overdue = 0;
$follow_up = 0;
$on_time = 0;

foreach ($requests as $r) {
    if ($r['status'] !== 'Submitted' && $r['status'] !== 'Under review') {
        continue;
    }

    $days = intdiv(
        strtotime($today) - strtotime($r['submitted']),
        86400
    );

    $band = wait_band($days);

    $name = trim($r['first']) . ' ' . trim($r['last']);

    echo "#{$r['id']} {$name} — {$days} days — {$band}\n";

    if ($band === 'Overdue') {
        $overdue++;
    } elseif ($band === 'Follow up') {
        $follow_up++;
    } elseif ($band === 'On time') {
        $on_time++;
    }
}

echo "\n";
echo "$overdue overdue · $follow_up follow up · $on_time on time\n\n";

echo "Edge tests:\n";

$test_days = [-1, 0, 7, 8, 14, 15];

foreach ($test_days as $days) {
    echo "$days: " . wait_band($days) . "\n";
}
