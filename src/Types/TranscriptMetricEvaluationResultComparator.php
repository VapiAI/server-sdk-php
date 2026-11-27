<?php

namespace Vapi\Types;

enum TranscriptMetricEvaluationResultComparator: string
{
    case EqualTo = "=";
    case NotEquals = "!=";
    case GreaterThan = ">";
    case LessThan = "<";
    case GreaterThanOrEqualTo = ">=";
    case LessThanOrEqualTo = "<=";
}
