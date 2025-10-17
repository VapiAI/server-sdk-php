<?php

namespace Vapi\Types;

enum TransferAssistantModelProvider: string
{
    case Openai = "openai";
    case Anthropic = "anthropic";
    case Google = "google";
    case CustomLlm = "custom-llm";
}
