<?php

namespace Vapi\Types;

enum ClientMessageTranscriptType
 : string {
    case Transcript = "transcript";
    case TranscriptTranscriptTypeFinal = "transcript[transcriptType="final"]";
}
