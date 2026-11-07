<?php

namespace Vapi\Types;

enum CallHealthDashboardIssueActivityDtoAction: string
{
    case Resolve = "resolve";
    case Dismiss = "dismiss";
    case Restore = "restore";
    case Reopen = "reopen";
}
