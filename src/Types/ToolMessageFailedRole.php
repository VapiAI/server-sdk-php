<?php

namespace Vapi\Types;

enum ToolMessageFailedRole: string
{
    case Assistant = "assistant";
    case System = "system";
}
