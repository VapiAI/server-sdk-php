<?php

namespace Vapi\Types;

enum TurnLatencyUnmeasuredItem: string
{
    case Transcriber = "transcriber";
    case Endpointing = "endpointing";
    case Model = "model";
    case Voice = "voice";
}
