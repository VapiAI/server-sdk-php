<?php

namespace Vapi\Types;

enum FallbackAssemblyAiTranscriberMode: string
{
    case MaxAccuracy = "max_accuracy";
    case MinLatency = "min_latency";
    case Balanced = "balanced";
}
