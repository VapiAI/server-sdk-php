<?php

namespace Vapi\Types;

enum AnalyticsOperationColumn: string
{
    case Id = "id";
    case Cost = "cost";
    case CostBreakdownLlm = "costBreakdown.llm";
    case CostBreakdownStt = "costBreakdown.stt";
    case CostBreakdownTts = "costBreakdown.tts";
    case CostBreakdownVapi = "costBreakdown.vapi";
    case CostBreakdownTransport = "costBreakdown.transport";
    case CostBreakdownAnalysisBreakdownSummary = "costBreakdown.analysisBreakdown.summary";
    case CostBreakdownTranscriber = "costBreakdown.transcriber";
    case CostBreakdownTtsCharacters = "costBreakdown.ttsCharacters";
    case CostBreakdownLlmPromptTokens = "costBreakdown.llmPromptTokens";
    case CostBreakdownLlmCompletionTokens = "costBreakdown.llmCompletionTokens";
    case CostBreakdownLlmCachedPromptTokens = "costBreakdown.llmCachedPromptTokens";
    case Duration = "duration";
    case Concurrency = "concurrency";
    case MinutesUsed = "minutesUsed";
}
