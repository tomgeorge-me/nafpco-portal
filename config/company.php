<?php

return [
    'legal_name' => 'Neyyassery Agro Food Producer Company Limited',
    'short_name' => 'NAFPCO',

    'cin' => 'U01100KL2016PTC040440',
    'incorporated_on' => '2016-03-24',
    'status' => 'Active',
    'entity_type' => 'Private Farmer Producer Company',

    'address' => [
        'line1' => '1/126, Karimannoor Rubber Producers Society',
        'line2' => 'Neyyassery P.O.',
        'city' => 'Thodupuzha',
        'district' => 'Idukki',
        'state' => 'Kerala',
        'pincode' => '685581',
        'country' => 'India',
    ],

    'sector' => 'Agro-processing, spices, and local farmer connectivity',

    'contact' => [
        'email' => env('ENQUIRY_NOTIFY_EMAIL', 'info@neyyassery-agro.example'),
        'phone' => null, // fill in once available
    ],

    'product_categories' => [
        'spices' => 'Spices',
        'baked-goods' => 'Baked Goods',
        'beverages' => 'Beverages',
    ],
];
