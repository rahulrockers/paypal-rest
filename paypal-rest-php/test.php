<?php
// 1. Autoload the SDK Package. This will include all the files and classes to your autoloader
// Used for composer based installation
require __DIR__  . '/vendor/autoload.php';
// Use below for direct download installation
// require __DIR__  . '/vendor/autoload.php';

// After Step 1
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AZ8QDutcvQT35l5WTLU2mD3wjcoAyeYfLj40r3lM2u4lziFUaF3Pt96dyTBf22_jYVSH7sSsRQXuL8QA',     // ClientID
        'EFcgg5j1Z87dPdp8ZsMr5fpVP8mvC6iEnBaOBFNjPWzWAiV9kt0nk7fDqaQDrNVSJjKoZzdMYOZ1AjHF'      // ClientSecret
    )
);

// After Step 2
$creditCard = new \PayPal\Api\CreditCard();
$creditCard->setType("visa")
    ->setNumber("4417119669820331")
    ->setExpireMonth("11")
    ->setExpireYear("2019")
    ->setCvv2("012")
    ->setFirstName("Joe")
    ->setLastName("Shopper");

// After Step 3
try {
    $creditCard->create($apiContext);
    echo $creditCard;
}
catch (\PayPal\Exception\PayPalConnectionException $ex) {
    // This will print the detailed information on the exception. 
    //REALLY HELPFUL FOR DEBUGGING
    echo $ex->getData();
}