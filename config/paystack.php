<?php

return [
    
    'secret_key' => env('PAYSTACK_SECRET_KEY', ''),
    
    'public_key' => env('PAYSTACK_PUBLIC_KEY', ''),

    'payment_url' => env('PAYSTACK_PAYMENT_URL'),

    'email' => env('PAYSTACK_EMAIL')

];