<?php

namespace Vapi\Types;

enum EventsTableStringConditionOperator: string
{
    case EqualTo = "=";
    case NotEquals = "!=";
    case Contains = "contains";
    case NotContains = "notContains";
}
