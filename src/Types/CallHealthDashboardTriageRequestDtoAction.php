<?php

namespace Vapi\Types;

enum CallHealthDashboardTriageRequestDtoAction: string
{
    case Resolve = "resolve";
    case Dismiss = "dismiss";
    case Restore = "restore";
}
