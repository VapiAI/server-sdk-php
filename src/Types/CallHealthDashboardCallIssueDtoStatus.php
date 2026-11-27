<?php

namespace Vapi\Types;

enum CallHealthDashboardCallIssueDtoStatus: string
{
    case Active = "active";
    case Resolved = "resolved";
    case Dismissed = "dismissed";
}
