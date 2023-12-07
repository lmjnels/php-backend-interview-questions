<?php

namespace App\Payments;

use App\PaymentGateway;
use App\Payments\Braintree\Braintree;
use App\Payments\Stripe\Stripe;
use Exception;

class PaymentContainer
{
    private static ?PaymentGateway $paymentService = null;

    public function __construct()
    {
        // config set here
        $this->setPaymentService($serviceName = 'Braintree');

    }

    public function setPaymentService(string $paymentServiceName)
    {
        $paymentServiceName = strtoupper($paymentServiceName);

        switch($paymentServiceName){
            case PaymentType::BRAINTREE: self::$paymentService = new Braintree(); break;
            case PaymentType::STRIPE: self::$paymentService = new Stripe(); break;
            default: throw new \InvalidArgumentException(
                sprintf('Payment Service %s could not be determined.', $paymentServiceName)
            );
        }
    }

    /**
     * @throws Exception
     */
    public static function getService(string $serviceName = null): PaymentGateway
    {
        if(self::$paymentService === null)
            throw new \Exception('Payment Service has not been determined');

        return self::$paymentService;
    }
}