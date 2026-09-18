<?php

namespace Vapi\Types;

enum EndedReasonConditionOperator: string
{
    case OneOf = "oneOf";
    case NotOneOf = "notOneOf";
}
