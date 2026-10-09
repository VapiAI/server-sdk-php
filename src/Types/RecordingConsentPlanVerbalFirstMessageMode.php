<?php

namespace Vapi\Types;

enum RecordingConsentPlanVerbalFirstMessageMode: string
{
    case AssistantSpeaksFirst = "assistant-speaks-first";
    case AssistantWaitsForUser = "assistant-waits-for-user";
}
