<?php

namespace Vapi\Types;

enum LivekitSmartEndpointingPlanProvider: string
{
    case Vapi = "vapi";
    case Livekit = "livekit";
    case CustomEndpointingModel = "custom-endpointing-model";
}
