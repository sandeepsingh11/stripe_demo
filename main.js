// Create an instance of the Stripe object with your publishable API key
var stripe = Stripe("pk_test_51HRREEJDW8ZcgUQr9dBxJtNV6Sni36aNwyPlimPj3LzgaSyXt6RPF8PvnPTWeEHpBHfdW62kodZiBMlbzitI1JFp0049wuboiI");

var checkoutEle = document.getElementById("checkout-button");
checkoutEle.addEventListener("click", function() {
    console.log(JSON.stringify(cart));
    
    fetch("/stripe_demo/checkout.php", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(cartObj)
    })
    .then(function (response) {
        return response.json();
    })
    .then(function (session) {
        // add check if cart is empty
        return stripe.redirectToCheckout({ 
            sessionId: session.id
        });
    })
    .then(function (result) {
        // If redirectToCheckout fails due to a browser or network
        // error, you should display the localized error message to your
        // customer using error.message.
        if (result.error) {
          alert(result.error.message);
        }
    })
    .catch(function (error) {
        console.log(error);
        // see logs at:
        // https://dashboard.stripe.com/test/logs?method[]=post&method[]=delete&direction[]=connect_in&direction[]=self
    })
});










// DOM logic


// "add" quantity logic
var cart = [];
var cartObj = {"data": cart}; // to pass as json post (line 8)
var addEle = document.getElementsByClassName("add-button");
var quantityEle = document.getElementsByClassName("quantity");

for (var i = 0; i < addEle.length; i++) {
    addEle[i].addEventListener("click", function(e) {
        // find which item was clicked
        var clickedEle = e.target;
        var clickedWaifu = clickedEle.id;

        for (var j = 0; j < quantityEle.length; j++) {
            if (quantityEle[j].getAttribute("data-waifu") === clickedWaifu) {
                // match clicked "add" button with corresponding input value
                // and save that value
                var quantity = parseInt(quantityEle[j].value);
                var priceID = quantityEle[j].getAttribute("data-price-id");

                
                // line_item object structure
                // https://stripe.com/docs/api/checkout/sessions/create#create_checkout_session-line_items
                var lineItem = {
                    price : priceID,
                    quantity : quantity
                };

                cart.push(lineItem);
            }
        }
    });
}