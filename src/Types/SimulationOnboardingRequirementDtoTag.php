<?php

namespace Vapi\Types;

enum SimulationOnboardingRequirementDtoTag: string
{
    case Assumption = "assumption";
    case NotTestable = "not-testable";
    case VoiceOnly = "voice-only";
}
