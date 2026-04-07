<?php

namespace Vapi\Types;

enum OpenAiModelPromptCacheRetention: string
{
    case InMemory = "in_memory";
    case TwentyFourH = "24h";
}
