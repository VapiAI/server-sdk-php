<?php

namespace Vapi\Types;

enum SimulationOnboardingToolGapDtoReason: string
{
    case DynamicHandoff = "dynamic-handoff";
    case DestinationNotPlain = "destination-not-plain";
    case DestinationUnresolved = "destination-unresolved";
    case DestinationTruncated = "destination-truncated";
    case TransferExternal = "transfer-external";
    case DestinationNameUnscoped = "destination-name-unscoped";
    case NativeToolShadowed = "native-tool-shadowed";
}
