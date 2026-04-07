<?php

namespace Vapi\Types;

enum EventsTableNumberConditionOperator: string
{
    case EqualTo = "=";
    case NotEquals = "!=";
    case GreaterThan = ">";
    case GreaterThanOrEqualTo = ">=";
    case LessThan = "<";
    case LessThanOrEqualTo = "<=";
}
