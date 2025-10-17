<?php

namespace Vapi\Campaigns\Types;

enum CampaignControllerFindAllRequestStatus: string
{
    case Scheduled = "scheduled";
    case InProgress = "in-progress";
    case Ended = "ended";
}
