<?php

namespace Vapi\Types;

enum OpenAiVoicemailDetectionPlanType: string
{
    case Audio = "audio";
    case Transcript = "transcript";
}
