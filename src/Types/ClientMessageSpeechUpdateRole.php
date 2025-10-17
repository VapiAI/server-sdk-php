<?php

namespace Vapi\Types;

enum ClientMessageSpeechUpdateRole: string
{
    case Assistant = "assistant";
    case User = "user";
}
