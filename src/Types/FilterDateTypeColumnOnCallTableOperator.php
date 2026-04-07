<?php

namespace Vapi\Types;

enum FilterDateTypeColumnOnCallTableOperator: string
{
    case EqualTo = "=";
    case NotEquals = "!=";
    case GreaterThan = ">";
    case LessThan = "<";
    case GreaterThanOrEqualTo = ">=";
    case LessThanOrEqualTo = "<=";
}
