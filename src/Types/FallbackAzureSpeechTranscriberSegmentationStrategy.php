<?php

namespace Vapi\Types;

enum FallbackAzureSpeechTranscriberSegmentationStrategy: string
{
    case Default_ = "Default";
    case Time = "Time";
    case Semantic = "Semantic";
}
