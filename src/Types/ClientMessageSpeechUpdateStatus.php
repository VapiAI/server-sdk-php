<?php

namespace Vapi\Types;

enum ClientMessageSpeechUpdateStatus: string
{
    case Started = "started";
    case Stopped = "stopped";
}
