<?php

namespace Vapi\Types;

enum TransportConfigurationTwilioRecordingChannels: string
{
    case Mono = "mono";
    case Dual = "dual";
}
