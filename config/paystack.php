<?php

return [
    'public_key' => env('PAYSTACK_PUBLIC_KEY'),
    'secret_key' => env('PAYSTACK_SECRET_KEY'),
    'payment_url' => 'https://api.paystack.co/transaction/initialize',
    'verify_url' => 'https://api.paystack.co/transaction/verify/',
];