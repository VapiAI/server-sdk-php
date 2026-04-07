<?php

namespace Vapi\Types;

enum FilterStringTypeColumnOnCallTableOperator: string
{
    case EqualTo = "=";
    case NotEquals = "!=";
    case Contains = "contains";
    case NotContains = "not_contains";
}
