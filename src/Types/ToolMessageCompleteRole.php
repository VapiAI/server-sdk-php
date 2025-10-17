<?php

namespace Vapi\Types;

enum ToolMessageCompleteRole: string
{
    case Assistant = "assistant";
    case System = "system";
}
