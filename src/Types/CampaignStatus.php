<?php

namespace Vapi\Types;

enum CampaignStatus: string
{
    case Scheduled = "scheduled";
    case InProgress = "in-progress";
    case Ended = "ended";
    case Cancelled = "cancelled";
    case Archived = "archived";
}
