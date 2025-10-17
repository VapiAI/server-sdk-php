<?php

namespace Vapi\Types;

enum VapiPhoneNumberStatus: string
{
    case Active = "active";
    case Activating = "activating";
    case Blocked = "blocked";
}
