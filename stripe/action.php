<?php 
require_once ('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_51No4opDWHHHv90chqkRkpDzFhtiyeu6byzhH4blwKkqS7Lh49FeMA7KtHDlq9MVTMn10IHOeFXsb0adx8HlLZTgS00jN8wf1do');
$charge = \Stripe\Charge::create([
    'source' => $_POST['stripeToken'],
    'description' => "10 cucumbers from Roger's Farm",
    'amount' => 2000,
    'currency' => 'usd',
]);
echo '<prev>';
print_r($charge);
echo '</prev>';
?>