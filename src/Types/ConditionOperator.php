<?php

namespace Vapi\Types;

enum ConditionOperator: string
{
    case Eq = "eq";
    case Neq = "neq";
    case Gt = "gt";
    case Gte = "gte";
    case Lt = "lt";
    case Lte = "lte";
}
