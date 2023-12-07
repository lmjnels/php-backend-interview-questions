<?php

namespace App\Payments\Stripe;

use App\PaymentGateway;

class StripeGatewayFactory extends \App\Payments\PaymentFactory
{

    public static function create(): PaymentGateway
    {
        return new Stripe();
    }
}