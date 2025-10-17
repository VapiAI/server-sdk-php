<?php

namespace Vapi\Types;

enum CallPhoneCallTransport: string
{
    case Sip = "sip";
    case Pstn = "pstn";
}
