<?php

namespace Vapi\Types;

enum SimulationRunTransportConfigurationProvider: string
{
    case VapiWebsocket = "vapi.websocket";
    case VapiWebchat = "vapi.webchat";
}
