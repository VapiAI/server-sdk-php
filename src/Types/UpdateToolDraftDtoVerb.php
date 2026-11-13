<?php

namespace Vapi\Types;

enum UpdateToolDraftDtoVerb: string
{
    case Info = "INFO";
    case Message = "MESSAGE";
    case Notify = "NOTIFY";
}
