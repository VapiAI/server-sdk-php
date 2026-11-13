<?php

namespace Vapi\Types;

enum CallHealthDashboardSweepCoverageDtoState: string
{
    case Idle = "idle";
    case Enumerating = "enumerating";
    case Processing = "processing";
    case Deduplicating = "deduplicating";
    case Blocked = "blocked";
}
