<?php

namespace Vapi\Types;

enum CreateSipRequestToolDtoVerb: string
{
    case Info = "INFO";
    case Message = "MESSAGE";
    case Notify = "NOTIFY";
}
