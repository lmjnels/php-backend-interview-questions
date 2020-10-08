<?php

namespace App;

use function App\card_number_to_card_type;

class CheckoutSession
{
    private PaymentGateway $paymentGateway;

    public function process(PaymentRequest $request): bool
    {
        $token = $this->paymentGateway->tokenise($request->cardInput);

        return $this->paymentGateway->charge($token, $request->amountInPence);
    }
}
