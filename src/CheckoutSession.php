<?php

namespace App;

use App\Payments\Braintree\BraintreeGatewayFactory;
use App\Payments\PaymentContainer;
use App\Payments\Stripe\StripeGatewayFactory;

class CheckoutSession
{
    private PaymentGateway $paymentGateway;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->paymentGateway = PaymentContainer::getService();
    }

    /**
     * @throws \Exception
     */
    public function process(PaymentRequest $request): bool
    {
        $this->paymentGateway = $this->determineGatewayByCardType($request->cardInput);

        $token = $this->paymentGateway->tokenise($request->cardInput);

        return $this->paymentGateway->charge($token, $request->amountInPence);
    }

    /**
     * @throws \Exception
     */
    private function determineGatewayByCardType($cardNumber): PaymentGateway
    {
        $card = \App\card_number_to_card_type($cardNumber);

        switch ($card->getType())
        {
            case CardType::AMEX: return $this->paymentGateway = BraintreeGatewayFactory::create();
            case CardType::MASTERCARD: return $this->paymentGateway = StripeGatewayFactory::create();
            default: throw new \Exception('Card could not be processed');
        }
    }
}
