<?php

namespace Vapi\Campaigns\Types;

enum CampaignControllerGetCampaignV2ContactsRequestStatusItem: string
{
    case ContactPending = "contact.pending";
    case ContactDispatched = "contact.dispatched";
    case ContactCompleted = "contact.completed";
    case ContactFailed = "contact.failed";
    case ContactSkipped = "contact.skipped";
    case ContactPredialFailed = "contact.predial-failed";
}
