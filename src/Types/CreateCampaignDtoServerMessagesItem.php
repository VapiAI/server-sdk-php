<?php

namespace Vapi\Types;

enum CreateCampaignDtoServerMessagesItem: string
{
    case CampaignStarted = "campaign.started";
    case CampaignCancelled = "campaign.cancelled";
    case CampaignEnded = "campaign.ended";
    case CampaignArchived = "campaign.archived";
    case CampaignUnarchived = "campaign.unarchived";
    case ContactDispatched = "contact.dispatched";
    case ContactCompleted = "contact.completed";
    case ContactFailed = "contact.failed";
    case ContactSkipped = "contact.skipped";
    case ContactPredialFailed = "contact.predial-failed";
    case CampaignJobContinued = "campaign.job.continued";
}
