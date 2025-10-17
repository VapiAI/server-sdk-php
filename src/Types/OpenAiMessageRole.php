<?php

namespace Vapi\Types;

enum OpenAiMessageRole: string
{
    case Assistant = "assistant";
    case Function_ = "function";
    case User = "user";
    case System = "system";
    case Tool = "tool";
}
