<?php

// https://stripe.com/docs/api/checkout/sessions/create



require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey("???");


header('Content-Type: application/json');
const DOMAIN = 'http://localhost/stripe_demo/';




$checkout_session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'unit_amount' => 1000,
            'product_data' => [
                'name' => 'Kyoko Kirigiri',
                'images' => ["./img/kyoko kirigiri.jpg"],
            ],
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => DOMAIN . '/success.php',
    'cancel_url' => DOMAIN . '/cancel.php'
]);

echo json_encode(['id' => $checkout_session->id]);