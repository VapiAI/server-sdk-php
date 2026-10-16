<?php

namespace Vapi\Types;

enum DeepSeekModelModel: string
{
    case DeepseekChat = "deepseek-chat";
    case DeepseekReasoner = "deepseek-reasoner";
    case DeepseekFlash = "deepseek-flash";
    case DeepseekFlashThinking = "deepseek-flash-thinking";
}
