<?php

namespace Vapi\Types;

enum CampaignSummaryEndedReason: string
{
    case CampaignScheduledEndedByUser = "campaign.scheduled.ended-by-user";
    case CampaignInProgressEndedByUser = "campaign.in-progress.ended-by-user";
    case CampaignEndedSuccess = "campaign.ended.success";
}
