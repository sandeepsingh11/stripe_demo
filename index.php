<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Waifus | Stripe Payment - Checkout</title>

    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <!-- https://stripe.com/docs/payments/accept-a-payment?integration=checkout -->

    <h1>Best Waifus</h1>

    <section>
        
        <div id="products-container">
            <?php

            require_once("./items_db.php");
            foreach ($prices as $priceObj) {
                $productObj = getProduct($priceObj["product"]);
                $waifuName = str_replace(' ', '-', $productObj['name']);

                ?>

                <div class="product">
                    <div class="product-img">
                        <img src="<?php echo $productObj['images'][0] ?>" alt="Picture of <?php echo $productObj['name'] ?>">
                    </div>

                    <h3 class="product-name"><?php echo $productObj['name'] ?></h3>
                    <p class="product-desc"><?php echo $productObj['description'] ?></p>

                    <div class="price-container">
                        <h4 class="product-price">$<?php echo ($priceObj['unit_amount'] / 100) ?></h4>

                        <div class="quantity-container">
                            <input type="number" name="<?php echo "quantity-" . $waifuName ?>" class="quantity" data-waifu="<?php echo $waifuName ?>" data-price-id="<?php echo $priceObj['id'] ?>" value=0>
                        </div>
                    </div>



                    <button class="button add-button" id="<?php echo $waifuName ?>">Add</button>
                </div>

                <?php
            }
            
            ?>

        </div>



        <button class="button" id="checkout-button">Checkout</button>
    </section>




    <script src="./main.js"></script>
</body>
</html>