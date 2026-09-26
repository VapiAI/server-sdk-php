<?php

namespace Vapi\Types;

enum RecordingConsentPlanStayOnLineFirstMessageMode: string
{
    case AssistantSpeaksFirst = "assistant-speaks-first";
    case AssistantWaitsForUser = "assistant-waits-for-user";
}
