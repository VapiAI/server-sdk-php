<?php

namespace Vapi\Types;

enum FallbackAssemblyAiTranscriberSpeechModel: string
{
    case UniversalStreamingEnglish = "universal-streaming-english";
    case UniversalStreamingMultilingual = "universal-streaming-multilingual";
    case Universal35Pro = "universal-3-5-pro";
}
