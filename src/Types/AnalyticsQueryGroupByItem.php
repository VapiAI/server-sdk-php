<?php

namespace Vapi\Types;

enum AnalyticsQueryGroupByItem: string
{
    case Type = "type";
    case AssistantId = "assistantId";
    case EndedReason = "endedReason";
    case AnalysisSuccessEvaluation = "analysis.successEvaluation";
    case Status = "status";
}
