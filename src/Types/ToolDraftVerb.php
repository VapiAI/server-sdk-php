<?php

namespace Vapi\Types;

enum ToolDraftVerb: string
{
    case Info = "INFO";
    case Message = "MESSAGE";
    case Notify = "NOTIFY";
}
