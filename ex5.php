<?php
declare(strict_types=1);
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

echo "EXERCISE 5 - Status rules\n";
echo "==========================\n\n";

// The workflow rules are stored in helpers.php as an array.
// can_move() uses the array rather than a long if/elseif chain.

$test_moves = [
    ['from' => 'Submitted', 'to' => 'Under review'],
    ['from' => 'Submitted', 'to' => 'Approved'],
    ['from' => 'Under review', 'to' => 'Rejected'],
    ['from' => 'Approved', 'to' => 'Submitted'],
    ['from' => 'Rejected', 'to' => 'Submitted'],
    ['from' => 'Closed', 'to' => 'Submitted'],
];

foreach ($test_moves as $move) {
    $result = can_move($move['from'], $move['to']) ? 'Allowed' : 'Blocked';

    echo $move['from'] . " → " . $move['to'] . ": " . $result . "\n";
}

echo "\nRole tests:\n";

$role_tests = [
    ['role' => 'officer', 'from' => 'Under review', 'to' => 'Approved'],
    ['role' => 'approver', 'from' => 'Under review', 'to' => 'Approved'],
    ['role' => 'requester', 'from' => 'Rejected', 'to' => 'Submitted'],
];

foreach ($role_tests as $test) {
    $result = can_move_as(
        $test['role'],
        $test['from'],
        $test['to']
    ) ? 'true' : 'false';

    echo "can_move_as('{$test['role']}', '{$test['from']}', '{$test['to']}') = $result\n";
}

echo "\nWhy an array is better:\n";
echo "The workflow rules are stored as data, so they are easier to read, change, extend and reuse than a long if/elseif chain.\n";
