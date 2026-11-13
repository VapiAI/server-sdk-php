<?php

namespace Vapi\Types;

enum SimulationRunPaymentRequiredResponseReason: string
{
    case WalletMissing = "wallet_missing";
    case SubscriptionFrozen = "subscription_frozen";
    case PaymentMethodMissing = "payment_method_missing";
    case InsufficientCredits = "insufficient_credits";
    case BillingLimit = "billing_limit";
    case InitialPaymentMissing = "initial_payment_missing";
}
