<?php

namespace Vapi\Types;

enum VersionPinReferenceSourceType: string
{
    case AssistantVersion = "assistant_version";
    case Squad = "squad";
    case ToolVersion = "tool_version";
}
