<?php

namespace Vapi\Types;

enum ServerMessageTranscriptTranscriptType: string
{
    case Partial = "partial";
    case Final_ = "final";
}
