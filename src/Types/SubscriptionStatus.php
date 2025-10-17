<?php

namespace Vapi\Types;

enum SubscriptionStatus: string
{
    case Active = "active";
    case Frozen = "frozen";
}
