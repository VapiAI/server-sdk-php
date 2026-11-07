<?php

namespace Vapi\Types;

enum SimulationOnboardingCoverageGapDtoReason: string
{
    case NotTestable = "not-testable";
    case Unmapped = "unmapped";
    case Failed = "failed";
    case Budget = "budget";
}
