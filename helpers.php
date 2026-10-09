<?php
declare(strict_types=1);

/**
 * Create a request reference such as PAR-2026-0002.
 *
 * The exercise asks for the ID as 4 digits. Therefore an ID such as
 * 12345 will produce 12345 rather than silently cutting off a digit.
 */
function make_reference(int $id, string $dzongkhag, string $submitted): string
{
    $prefix = strtoupper(substr(trim($dzongkhag), 0, 3));
    $year = date('Y', strtotime($submitted));

    return sprintf('%s-%s-%04d', $prefix, $year, $id);
}

/**
 * Return the waiting-time band.
 */
function wait_band(int $days): string
{
    if ($days < 0) {
        return 'Check date';
    }

    if ($days <= 7) {
        return 'On time';
    }

    if ($days <= 14) {
        return 'Follow up';
    }

    return 'Overdue';
}

/**
 * Check whether a CID contains exactly 11 digits.
 */
function is_valid_cid(string $cid): bool
{
    return preg_match('/^\d{11}$/', $cid) === 1;
}

/**
 * B-PIS workflow rules.
 */
$workflow_rules = [
    'Submitted' => ['Under review'],
    'Under review' => ['Approved', 'Rejected'],
    'Rejected' => ['Submitted'],
    'Approved' => [],
];

/**
 * Check whether a status transition is allowed.
 */
function can_move(string $from, string $to): bool
{
    global $workflow_rules;

    // ?? prevents an Undefined array key warning for unknown statuses.
    $allowed = $workflow_rules[$from] ?? [];

    return in_array($to, $allowed, true);
}

/**
 * Check whether a role is allowed to make a particular move.
 */
function can_move_as(string $role, string $from, string $to): bool
{
    $allowed_roles = [
        'officer' => ['Under review'],
        'approver' => ['Approved', 'Rejected'],
        'requester' => ['Submitted'],
    ];

    // First check the workflow rule.
    if (!can_move($from, $to)) {
        return false;
    }

    // Unknown roles safely get an empty list.
    $allowed_targets = $allowed_roles[$role] ?? [];

    return in_array($to, $allowed_targets, true);
}

/**
 * Count pending requests: Submitted or Under review.
 */
function count_pending(array $requests): int
{
    $total = 0;

    foreach ($requests as $request) {
        $status = $request['status'];

        if ($status === 'Submitted' || $status === 'Under review') {
            $total++;
        }
    }

    return $total;
}
