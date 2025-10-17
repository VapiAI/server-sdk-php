<?php

namespace Vapi\Types;

enum TwilioPhoneNumberStatus: string
{
    case Active = "active";
    case Activating = "activating";
    case Blocked = "blocked";
}
