<?php

namespace Vapi\Types;

enum AnalyticsQueryTable: string
{
    case Call = "call";
    case Subscription = "subscription";
}
