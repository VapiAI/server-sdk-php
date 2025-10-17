<?php

namespace Vapi\Types;

enum SubscriptionType: string
{
    case PayAsYouGo = "pay-as-you-go";
    case Enterprise = "enterprise";
    case Agency = "agency";
    case Startup = "startup";
    case Growth = "growth";
    case Scale = "scale";
}
