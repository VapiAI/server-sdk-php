<?php

namespace Vapi\Types;

enum CustomEndpointingModelSmartEndpointingPlanProvider: string
{
    case Vapi = "vapi";
    case Livekit = "livekit";
    case CustomEndpointingModel = "custom-endpointing-model";
}
