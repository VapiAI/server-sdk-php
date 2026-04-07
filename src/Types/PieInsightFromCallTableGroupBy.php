<?php

namespace Vapi\Types;

enum PieInsightFromCallTableGroupBy: string
{
    case AssistantId = "assistantId";
    case WorkflowId = "workflowId";
    case SquadId = "squadId";
    case PhoneNumberId = "phoneNumberId";
    case Type = "type";
    case EndedReason = "endedReason";
    case CustomerNumber = "customerNumber";
    case CampaignId = "campaignId";
    case ArtifactStructuredOutputsOutputId = "artifact.structuredOutputs[OutputID]";
}
