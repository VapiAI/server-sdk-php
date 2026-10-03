<?php

namespace Vapi\Types;

enum ClientMessageTranscriptConfidenceSource: string
{
    case Provider = "provider";
    case Derived = "derived";
}
