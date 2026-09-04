<?php

namespace Vapi\Campaigns\Types;

enum CampaignControllerFindAllV2RequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
