<?php

namespace Vapi\Types;

enum FilterStringTypeColumnOnCallTableColumn: string
{
    case AssistantId = "assistantId";
    case WorkflowId = "workflowId";
    case SquadId = "squadId";
    case PhoneNumberId = "phoneNumberId";
    case Type = "type";
    case CustomerNumber = "customerNumber";
    case Status = "status";
    case EndedReason = "endedReason";
    case ForwardedPhoneNumber = "forwardedPhoneNumber";
    case CampaignId = "campaignId";
}
