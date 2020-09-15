<?php

// https://stripe.com/docs/api/products/create?lang=php
// https://stripe.com/docs/api/prices/create

require 'vendor/autoload.php';
$stripe = new \Stripe\StripeClient("???");





$prices = $stripe->prices->all();



function getProduct($productID) {
    global $stripe;
    
    return $stripe->products->retrieve($productID);
}