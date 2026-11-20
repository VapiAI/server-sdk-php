<?php

namespace Vapi\Types;

enum TrafficAllocationActorType: string
{
    case User = "user";
    case ApiKey = "api-key";
    case System = "system";
}
