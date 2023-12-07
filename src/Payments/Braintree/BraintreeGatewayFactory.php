<?php

namespace App\Payments\Braintree;

use App\PaymentGateway;
use App\Payments\PaymentFactory;

class BraintreeGatewayFactory extends PaymentFactory
{

    public static function create(): PaymentGateway
    {
        return new Braintree();
    }
}