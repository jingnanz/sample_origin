<?php

$stripe = array(
  "secret_key"      => "sk_test_rkVJp3wq2WbYi25JBuhzozC2",
  "publishable_key" => "pk_test_KRb78MBBOeSUjwbVFhm5rGCv"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);

class PaymentController{
	public function collect($payload){
		/*if (!array_key_exists('name', $payload)) {
            throw new Exception('`name` should be provided!', 400);
        } elseif (!array_key_exists('price', $payload)) {
            throw new Exception('`price` should be provided!', 400);
        }

        return $this->model->create($payload);
		*/

		$token  = $payload->stripeToken;

  		$customer = \Stripe\Customer::create(array(
     	'email' => $payload->email,
      	'source'  => $token
  		));

  		$charge = \Stripe\Charge::create(array(
  	    'customer' => $customer->id,
      	'amount'   => $payload->amount,
      	'currency' => 'cad'
  		));
	}
}