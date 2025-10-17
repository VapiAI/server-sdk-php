<?php

namespace Vapi\Types;

enum ClientInboundMessageControlControl: string
{
    case MuteAssistant = "mute-assistant";
    case UnmuteAssistant = "unmute-assistant";
    case MuteCustomer = "mute-customer";
    case UnmuteCustomer = "unmute-customer";
    case SayFirstMessage = "say-first-message";
}
