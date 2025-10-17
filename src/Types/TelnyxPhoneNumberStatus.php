<?php

namespace Vapi\Types;

enum TelnyxPhoneNumberStatus: string
{
    case Active = "active";
    case Activating = "activating";
    case Blocked = "blocked";
}
