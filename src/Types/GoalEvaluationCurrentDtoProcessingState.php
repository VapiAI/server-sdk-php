<?php

namespace Vapi\Types;

enum GoalEvaluationCurrentDtoProcessingState: string
{
    case Pending = "pending";
    case Running = "running";
    case Parked = "parked";
    case Unavailable = "unavailable";
    case Excluded = "excluded";
    case Completed = "completed";
}
