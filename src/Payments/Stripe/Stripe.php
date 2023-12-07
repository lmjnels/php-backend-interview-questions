<?php

namespace App\Payments\Stripe;

use App\CardInput;
use App\PaymentGateway;
use App\Payments\PaymentFactory;

class Stripe extends PaymentFactory implements PaymentGateway
{

    public function tokenise(CardInput $cardInput): string
    {
        // TODO: Implement tokenise() method.
    }

    public function charge(string $token, int $amountInPence): bool
    {
        // TODO: Implement charge() method.
    }

    public function create(): PaymentGateway
    {
        return new self();
    }
}