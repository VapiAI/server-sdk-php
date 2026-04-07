<?php

namespace Vapi\Types;

enum FilterStructuredOutputColumnOnCallTableOperator: string
{
    case EqualTo = "=";
    case NotEquals = "!=";
    case GreaterThan = ">";
    case LessThan = "<";
    case GreaterThanOrEqualTo = ">=";
    case LessThanOrEqualTo = "<=";
    case In = "in";
    case NotIn = "not_in";
    case Contains = "contains";
    case NotContains = "not_contains";
    case IsEmpty = "is_empty";
    case IsNotEmpty = "is_not_empty";
}
