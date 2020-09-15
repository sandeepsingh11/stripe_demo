<?php

// https://stripe.com/docs/api/checkout/sessions/create



require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey("???");


header('Content-Type: application/json');
const DOMAIN = 'http://localhost/stripe_demo/';





// get json post from "main.js"
$json = file_get_contents("php://input");
$cart = json_decode($json);

// populate line_items (from cart)
$line_item_content = [];
foreach ($cart->data as $itemObj) {
    $item = ['price' => $itemObj->price, 'quantity' => $itemObj->quantity];
    array_push($line_item_content, $item);
}





$checkout_session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => $line_item_content,
    'mode' => 'payment',
    'success_url' => DOMAIN . 'success.php',
    'cancel_url' => DOMAIN . 'cancel.php'
]);

echo json_encode(['id' => $checkout_session->id]);