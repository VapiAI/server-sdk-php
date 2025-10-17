<?php

namespace Vapi\Types;

enum CallPhoneCallProvider: string
{
    case Twilio = "twilio";
    case Vonage = "vonage";
    case Vapi = "vapi";
    case Telnyx = "telnyx";
}
