<?php

namespace Vapi\Types;

enum GuardrailRuleConflictResponseDtoError: string
{
    case RuleChanged = "rule_changed";
    case ImpactChanged = "impact_changed";
    case GlobalAssignment = "global_assignment";
}
