<?php

namespace Vapi\Types;

enum ServerMessageSpeechUpdateRole: string
{
    case Assistant = "assistant";
    case User = "user";
}
