var handler = StripeCheckout.configure({
  key: 'pk_test_KRb78MBBOeSUjwbVFhm5rGCv',
  image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
  locale: 'auto',
  token: function(token) {
    console.log(token);
    // Get the token ID to your server-side code for use.

    var data = {
      stripeToken:token.id,
      email:token.email,
      amount:3000
    };

    httpRequest('POST', '/payment/', data, function (response) {
      console.log('Response from server: ', response);
    });
  }
});

document.getElementById('customButton').addEventListener('click', function(e) {
  // Open Checkout with further options:
  handler.open({
    name: 'Unit Purchase',
    description: '2 widgets',
    currency: 'cad',
    amount: 2000
  });
  e.preventDefault();
});

// Close Checkout on page navigation:
window.addEventListener('popstate', function() {
  handler.close();
});