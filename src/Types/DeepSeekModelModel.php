<?php

namespace Vapi\Types;

enum DeepSeekModelModel: string
{
    case DeepseekChat = "deepseek-chat";
    case DeepseekReasoner = "deepseek-reasoner";
}
