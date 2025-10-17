<?php

namespace Vapi\Types;

enum VoicemailDetectionCostProvider: string
{
    case Twilio = "twilio";
    case Google = "google";
    case Openai = "openai";
    case Vapi = "vapi";
}
