<?php

namespace Vapi\Types;

enum CallHealthDashboardGoalCallDtoProcessingState: string
{
    case Pending = "pending";
    case Running = "running";
    case Parked = "parked";
    case Unavailable = "unavailable";
    case Excluded = "excluded";
    case Completed = "completed";
}
