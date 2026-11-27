<?php

namespace Vapi\Types;

enum SubscriptionBillingCollectionMethod: string
{
    case ChargeAutomatically = "charge_automatically";
    case SendInvoice = "send_invoice";
}
