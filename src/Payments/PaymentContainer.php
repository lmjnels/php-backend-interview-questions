<?php

namespace App\Payments;

use App\PaymentGateway;
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
            case 'BRAINTREE': $this->paymentService = new Braintree(); break;
            case 'STRIPE': $this->paymentService = new Stripe(); break;
            default: throw new \InvalidArgumentException(
                sprintf('Payment Service %s could not be determined.', $paymentServiceName)
            );
        }
    }

    /**
     * @throws Exception
     */
    public static function getService(): PaymentGateway
    {
        if(self::$paymentService === null)
            throw new \Exception('Payment Service has not been determined');

        return self::$paymentService;
    }
}