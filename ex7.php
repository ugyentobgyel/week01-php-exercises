<?php
declare(strict_types=1);
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

echo "EXERCISE 7 - Duplicate and invalid CIDs\n";
echo "========================================\n\n";

$cid_groups = [];

// Group request IDs by CID.
foreach ($requests as $r) {
    $cid = $r['cid'];

    if (!isset($cid_groups[$cid])) {
        $cid_groups[$cid] = [];
    }

    $cid_groups[$cid][] = $r['id'];
}

// Print only duplicate CIDs.
foreach ($cid_groups as $cid => $ids) {
    if (count($ids) > 1) {
        echo "Duplicate $cid: requests " . implode(', ', $ids) . "\n";
    }
}

// Print every invalid CID.
foreach ($requests as $r) {
    if (!is_valid_cid($r['cid'])) {
        echo "Invalid CID in request {$r['id']}: {$r['cid']}\n";
    }
}

echo "\nNote:\n";
echo "A duplicate CID is not automatically proof of an error. Requests 1 and 4 share a CID but have different names. Karma should verify the records and investigate before changing or deleting anything.\n";
