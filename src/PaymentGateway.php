<?php

namespace App;

interface PaymentGateway
{
    public function tokenise(CardInput $cardInput): string;

    public function charge(string $token, int $amountInPence): bool;
}
