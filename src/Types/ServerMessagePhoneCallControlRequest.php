<?php

namespace Vapi\Types;

enum ServerMessagePhoneCallControlRequest: string
{
    case Forward = "forward";
    case HangUp = "hang-up";
}
