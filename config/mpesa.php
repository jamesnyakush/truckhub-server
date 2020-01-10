<?php

// return [
//     'mpesa_env' => 'sandbox',
//     'consumer_key'   => 'Hf5hLPcMp61bfsvmdcprETTkGGxn5tr5',
//     'consumer_secret' => 'wEu9wcpQAEz1lvY6',
//     'paybill'         => '174379',
//     'lipa_na_mpesa'  => '174379',


//     'lipa_na_mpesa_passkey' => 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919',
//     'initiator_username' => 'testapi113',
//     'initiator_password' => 'bZMIFdgMD21OUEzAgWPqKBy/m2ipWiHLnRZ/UPYbqEOPhC0sDu65jNjyAEqLOoQcWaIR4BZoGbdNacH14g/O00uGSzxrrMZZEVQjxjpLORzdA0I4a6t1XEU/Fx2CcoqZRy3y1Q6BMHNsy45nUClj4K7QIG2YbfjkWtDAO/cqzKuknJDDbuNRtuI28e1qdIFugXKbrP18rR9FU7ITwcOLD3V+a6leyDGWK+2RZR8zUjZfCie9cnMgq4JYE6ZlPhKvb2e16HxL5BfwbnCSLCGMmCDW76raCujScltB5IZE6SnoFMNRzC9yZ56v+Fe8nTjpvx57fNzYLSeGt9Am8OW6kQ==',
//     'test_msisdn ' => '254708374149',
//     'validate_callback' => 'https://54ce2a97.ngrok.io/api/payment/validate',
//     'confirm_callback' => 'https://54ce2a97.ngrok.io/api/payment/confirm',

// ];

return [


    'default' => 'staging',

    'cache_location' => '../cache',


    'accounts' => [
        'staging' => [
            'sandbox' => true,
            'key' => '',
            'secret' => '',
            'initiator' => '',
            'id_validation_callback' => 'https://54ce2a97.ngrok.io/api/payment/validate',
            'lnmo' => [
                'paybill' => 174379,
                'shortcode' => 174379,
                'passkey' => '',
                'callback' => 'https://54ce2a97.ngrok.io/api/payment/confirm',
            ]
        ],

        'production' => [
            'sandbox' => false,
            'key' => '',
            'secret' => '',
            'initiator' => 'apitest363',
            'id_validation_callback' => 'http://example.com/callback?secret=some_secret_hash_key',
            'lnmo' => [
                'paybill' => 174379,
                'shortcode' => 174379,
                'passkey' => 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919',
                'callback' => 'http://example.com/callback?secret=some_secret_hash_key',
            ]
        ],
    ],
];