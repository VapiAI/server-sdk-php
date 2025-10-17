<?php

namespace Vapi\Types;

enum ServerMessageTranscriptType
 : string {
    case Transcript = "transcript";
    case TranscriptTranscriptTypeFinal = "transcript[transcriptType="final"]";
}
