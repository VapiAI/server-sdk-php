<?php

namespace Vapi\Types;

enum CallHealthDashboardIssueSummaryDtoStatus: string
{
    case Active = "active";
    case Resolved = "resolved";
    case Dismissed = "dismissed";
}
