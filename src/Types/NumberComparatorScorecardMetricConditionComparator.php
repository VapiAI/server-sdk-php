<?php

namespace Vapi\Types;

enum NumberComparatorScorecardMetricConditionComparator: string
{
    case EqualTo = "=";
    case NotEquals = "!=";
    case GreaterThan = ">";
    case LessThan = "<";
    case GreaterThanOrEqualTo = ">=";
    case LessThanOrEqualTo = "<=";
}
