<?php

namespace Vapi\Assistants\Types;

enum UpdateAssistantDtoFirstMessageMode: string
{
    case AssistantSpeaksFirst = "assistant-speaks-first";
    case AssistantSpeaksFirstWithModelGeneratedMessage = "assistant-speaks-first-with-model-generated-message";
    case AssistantWaitsForUser = "assistant-waits-for-user";
}
