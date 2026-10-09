<?php
declare(strict_types=1);
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

echo "EXERCISE 3 - Reference numbers\n";
echo "==============================\n\n";

foreach ($requests as $r) {
    $reference = make_reference(
        $r['id'],
        $r['dzongkhag'],
        $r['submitted']
    );

    echo $r['id'] . " - " . $reference . "\n";
}

echo "\nTests:\n";
echo make_reference(2, ' paro ', '2026-09-20') . "\n";
echo make_reference(6, 'Bumthang', '2026-10-03') . "\n";
echo make_reference(1, 'Thimphu', '2026-09-14') . "\n";

/*
Decision about ID 12345:
The exercise says the ID should be displayed as 4 digits.
For IDs longer than 4 digits, sprintf('%04d') does not cut the number.
This is safer because it does not silently change the original ID.
*/
