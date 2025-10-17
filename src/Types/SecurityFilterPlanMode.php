<?php

namespace Vapi\Types;

enum SecurityFilterPlanMode: string
{
    case Sanitize = "sanitize";
    case Reject = "reject";
    case Replace = "replace";
}
