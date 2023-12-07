<?php

namespace App\Payments;

use App\CardInput;
use App\PaymentGateway;

class Braintree implements PaymentGateway
{

    public function tokenise(CardInput $cardInput): string
    {
        // TODO: Implement tokenise() method.
    }

    public function charge(string $token, int $amountInPence): bool
    {
        // TODO: Implement charge() method.
    }
}