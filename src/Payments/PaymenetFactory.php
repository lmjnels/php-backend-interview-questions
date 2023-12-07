<?php

namespace App\Payments;

use App\PaymentGateway;

abstract class PaymentFactory
{
    abstract public static function create() :PaymentGateway;
}