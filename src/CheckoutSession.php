<?php

namespace App;

use App\Payments\PaymentContainer;
use function App\card_number_to_card_type;

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

    public function process(PaymentRequest $request): bool
    {
        $token = $this->paymentGateway->tokenise($request->cardInput);

        return $this->paymentGateway->charge($token, $request->amountInPence);
    }
}
