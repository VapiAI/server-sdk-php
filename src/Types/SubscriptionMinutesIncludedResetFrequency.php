<?php

namespace Vapi\Types;

enum SubscriptionMinutesIncludedResetFrequency: string
{
    case Monthly = "monthly";
    case Annually = "annually";
}
