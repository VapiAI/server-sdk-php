<?php

namespace Vapi\Types;

enum CallHealthDashboardCallResponseDtoAssessmentState: string
{
    case Pending = "pending";
    case Unavailable = "unavailable";
    case Skipped = "skipped";
    case Error = "error";
    case Excluded = "excluded";
    case Complete = "complete";
    case Partial = "partial";
}
