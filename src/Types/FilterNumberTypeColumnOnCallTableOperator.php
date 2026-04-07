<?php

namespace Vapi\Types;

enum FilterNumberTypeColumnOnCallTableOperator: string
{
    case EqualTo = "=";
    case NotEquals = "!=";
    case GreaterThan = ">";
    case LessThan = "<";
    case GreaterThanOrEqualTo = ">=";
    case LessThanOrEqualTo = "<=";
}
