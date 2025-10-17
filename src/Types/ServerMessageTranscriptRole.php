<?php

namespace Vapi\Types;

enum ServerMessageTranscriptRole: string
{
    case Assistant = "assistant";
    case User = "user";
}
