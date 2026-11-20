<?php

namespace Vapi\Types;

enum TransferArtifactStatus: string
{
    case Connected = "connected";
    case NoAnswer = "no-answer";
    case Busy = "busy";
    case Voicemail = "voicemail";
    case Failed = "failed";
    case Completed = "completed";
    case Cancelled = "cancelled";
}
