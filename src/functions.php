<?php

namespace App;

function card_number_to_card_type(string $cardNumber): CardType
{
    if (preg_match('/^[4]/', $cardNumber) === 1) {
        return new CardType(CardType::VISA);
    } else if (preg_match('/^[5][1-5]/', $cardNumber) === 1) {
        return new CardType(CardType::MASTERCARD);
    } else if (preg_match('/^[3](4|7)/', $cardNumber) === 1) {
        return new CardType(CardType::AMEX);
    }

    throw new \InvalidArgumentException('Card type unknown');
}
