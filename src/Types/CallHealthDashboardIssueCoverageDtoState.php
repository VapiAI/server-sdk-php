<?php

namespace Vapi\Types;

enum CallHealthDashboardIssueCoverageDtoState: string
{
    case Complete = "complete";
    case Partial = "partial";
    case Sweeping = "sweeping";
    case Blocked = "blocked";
}
