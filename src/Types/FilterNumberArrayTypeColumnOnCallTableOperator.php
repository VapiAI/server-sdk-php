<?php

namespace Vapi\Types;

enum FilterNumberArrayTypeColumnOnCallTableOperator: string
{
    case In = "in";
    case NotIn = "not_in";
    case IsEmpty = "is_empty";
    case IsNotEmpty = "is_not_empty";
}
