<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Waifus | Stripe Payment - Checkout</title>

    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <!-- https://stripe.com/docs/payments/accept-a-payment?integration=checkout -->

    <h1>Best Waifus</h1>

    <section>
        <div class="product">
        <img
            src="./img/kyoko_kirigiri.jpg"
            alt="An image of Kyoko Kirigiri"
        />
        <div class="description">
            <h3>Kyoko Kirigiri</h3>
            <h5>$10.00</h5>
        </div>
        </div>

        <button id="checkout-button">Checkout</button>
    </section>




    <script src="./main.js"></script>
</body>
</html>