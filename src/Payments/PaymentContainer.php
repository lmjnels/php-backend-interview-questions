<?php

namespace App\Payments;

use App\PaymentGateway;
use Exception;

class PaymentContainer
{
    private static array $services = [];

    /**
     * @throws Exception
     */
    public static function getService(string $serviceName): PaymentGateway {
        if (!isset(self::$services[$serviceName])) {
            throw new Exception("Service '$serviceName' not registered in PaymentContainer.");
        }

        return self::$services[$serviceName];
    }
}