<?php

namespace Vapi\Types;

enum UpdateSipRequestToolDtoVerb: string
{
    case Info = "INFO";
    case Message = "MESSAGE";
    case Notify = "NOTIFY";
}
