<?php

namespace Vapi\Types;

enum CallType: string
{
    case InboundPhoneCall = "inboundPhoneCall";
    case OutboundPhoneCall = "outboundPhoneCall";
    case WebCall = "webCall";
    case VapiWebsocketCall = "vapi.websocketCall";
}
