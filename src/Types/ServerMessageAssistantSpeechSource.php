<?php

namespace Vapi\Types;

enum ServerMessageAssistantSpeechSource: string
{
    case Model = "model";
    case ForceSay = "force-say";
    case CustomVoice = "custom-voice";
}
