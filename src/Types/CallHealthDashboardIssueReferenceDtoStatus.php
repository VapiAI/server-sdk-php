<?php

namespace Vapi\Types;

enum CallHealthDashboardIssueReferenceDtoStatus: string
{
    case Active = "active";
    case Resolved = "resolved";
    case Dismissed = "dismissed";
}
