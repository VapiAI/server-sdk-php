<?php

namespace Vapi\Types;

enum CallHealthDashboardAffectedCallDtoCallAvailability: string
{
    case Available = "available";
    case Unavailable = "unavailable";
}
