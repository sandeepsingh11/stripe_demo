// Create an instance of the Stripe object with your publishable API key
var stripe = Stripe("pk_test_51HRREEJDW8ZcgUQr9dBxJtNV6Sni36aNwyPlimPj3LzgaSyXt6RPF8PvnPTWeEHpBHfdW62kodZiBMlbzitI1JFp0049wuboiI");

var checkoutEle = document.getElementById("checkout-button");
checkoutEle.addEventListener("click", function() {
    fetch("/stripe_demo/checkout.php", {
        method: "POST"
    })
    .then(function (response) {
        return response.json();
    })
    .then(function (session) {
        return stripe.redirectToCheckout({ sessionId: session.id });
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
    })
});