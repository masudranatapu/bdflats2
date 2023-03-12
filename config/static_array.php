<?php
return [

    'property_for' => [
        'rent'      => 'Rent',
        'sale'      => 'Sale',
        'roommate'  => 'Roommate',
    ],

    'property_status' => [
        0 => 'Pending',
        10 => 'Published',
        20 => 'Unpublished',
        30 => 'Rejected',
        40 => 'Expired',
        50 => 'Deleted',
    ],

    'payment_status' => [
        0 => 'Due',
        1 => 'Paid',
    ],

    'payment_type' => [
        1 => 'Customer payment',
        2 => 'Bonus payment',
    ],
    'txn_type' => [
        1 => 'Recharge',
        2 => 'Deduction',
    ],

	'user_type' => [
		1 => 'Seeker',
		2 => 'Owner',
		3 => 'Builder',
		4 => 'Agency',
		5 => 'Agent of BDFLAT',
    ],

    'user_status' => [
		1 => 'Active',
		0 => 'Pending',
		3 => 'Inactive',
		4 => 'Deleted'
    ],

    'seeker_verification_status' => [
        0 => 'pending',
        1 => 'Valid',
        2 => 'Invalid',
        3 => 'Updated by user',
    ],
    'transaction_type' => [
        1 => 'Recharge',
        2 => 'Listing Ad',
        3 => 'Contact view',
        4 => 'Lead purchase',
    ],

    'bed_room' => [
        '1'    => '1 Bed',
        '2'    => '2 Bed',
        '3'    => '3 Bed',
        '4'    => '4 bed',
    ],

    'bath_room' => [
        '1'    => '1 Bath',
        '2'    => '2 Bath',
        '3'    => '3 Bath',
        '4'    => '4 Bath',
    ],

    'refund_status' => [
        1 => 'Pending',
        2 => 'Approved',
        3 => 'Denied'
    ],

]
?>
