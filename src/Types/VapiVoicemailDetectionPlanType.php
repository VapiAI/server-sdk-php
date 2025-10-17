<?php

namespace Vapi\Types;

enum VapiVoicemailDetectionPlanType: string
{
    case Audio = "audio";
    case Transcript = "transcript";
}
