<?php

namespace Vapi\Types;

enum CallHealthDashboardFacetsDtoStatusesItem: string
{
    case Active = "active";
    case Resolved = "resolved";
    case Dismissed = "dismissed";
}
