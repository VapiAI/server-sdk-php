<?php

namespace Vapi\Types;

enum SipRequestToolVerb: string
{
    case Info = "INFO";
    case Message = "MESSAGE";
    case Notify = "NOTIFY";
}
