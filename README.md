### Backend Interview Code Questions

1. Could you show the difference between dependency injection and a service locator by modifying the CheckoutSession class?

2. How would you add payment handling with multiple payment gateways, for example Stripe and Braintree? 
There would be only one active payment gateway at a time and it would be controlled through configuration.

3. How would you introduce ability to use different payment gateway depending on the card type?
For example, Amex payments would be handled by Braintree, while Mastercard payments would go through Stripe.

4. Could you refactor the CardType into a value object?
