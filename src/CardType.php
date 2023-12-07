<?php

namespace App;

class CardType
{
    const VISA = 'visa';
    const MASTERCARD = 'mastercard';
    const AMEX = 'amex';

    private string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function amex(): CardType
    {
        return new self(self::AMEX);
    }

    public function mastercard(): CardType
    {
        return new self(self::MASTERCARD);
    }

    public function visa(): CardType
    {
        return new self(self::VISA);
    }
}
