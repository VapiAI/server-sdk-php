<?php

namespace Vapi\Types;

enum ServerMessageSpeechUpdateStatus: string
{
    case Started = "started";
    case Stopped = "stopped";
}
