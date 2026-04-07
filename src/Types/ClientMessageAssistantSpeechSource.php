<?php

namespace Vapi\Types;

enum ClientMessageAssistantSpeechSource: string
{
    case Model = "model";
    case ForceSay = "force-say";
    case CustomVoice = "custom-voice";
}
