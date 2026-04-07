<?php

namespace Vapi\Types;

enum VapiSipTransportMessageSipVerb: string
{
    case Info = "INFO";
    case Message = "MESSAGE";
    case Notify = "NOTIFY";
}
