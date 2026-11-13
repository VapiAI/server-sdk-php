<?php

namespace Vapi\Types;

enum ServerMessageTranscriptConfidenceSource: string
{
    case Provider = "provider";
    case Derived = "derived";
}
