<?php

namespace Vapi\Campaigns\Types;

enum CampaignControllerFindAllRequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
