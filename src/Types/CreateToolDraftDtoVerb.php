<?php

namespace Vapi\Types;

enum CreateToolDraftDtoVerb: string
{
    case Info = "INFO";
    case Message = "MESSAGE";
    case Notify = "NOTIFY";
}
