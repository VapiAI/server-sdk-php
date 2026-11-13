<?php

namespace Vapi\Types;

enum GoalEvaluationCurrentDtoGoalOutcome: string
{
    case GoalMet = "goal_met";
    case GoalNotMet = "goal_not_met";
    case NotApplicable = "not_applicable";
}
