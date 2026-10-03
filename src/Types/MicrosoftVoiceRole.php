<?php

namespace Vapi\Types;

enum MicrosoftVoiceRole: string
{
    case Girl = "Girl";
    case Boy = "Boy";
    case YoungAdultFemale = "YoungAdultFemale";
    case YoungAdultMale = "YoungAdultMale";
    case OlderAdultFemale = "OlderAdultFemale";
    case OlderAdultMale = "OlderAdultMale";
    case SeniorFemale = "SeniorFemale";
    case SeniorMale = "SeniorMale";
}
