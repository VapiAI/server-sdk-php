<?php

namespace Vapi\Types;

enum OpenAiTranscriberModel: string
{
    case Gpt4OTranscribe = "gpt-4o-transcribe";
    case Gpt4OMiniTranscribe = "gpt-4o-mini-transcribe";
}
