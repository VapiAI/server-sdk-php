<?php

namespace Vapi\Types;

enum ByoPhoneNumberStatus: string
{
    case Active = "active";
    case Activating = "activating";
    case Blocked = "blocked";
}
