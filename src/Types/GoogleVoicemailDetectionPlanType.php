<?php

namespace Vapi\Types;

enum GoogleVoicemailDetectionPlanType: string
{
    case Audio = "audio";
    case Transcript = "transcript";
}
