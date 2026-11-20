<?php

namespace Vapi\Types;

enum SimulationOnboardingErrorDtoCode: string
{
    case SimulationOnboardingGenerationInProgress = "SIMULATION_ONBOARDING_GENERATION_IN_PROGRESS";
    case SimulationOnboardingIdempotencyKeyReused = "SIMULATION_ONBOARDING_IDEMPOTENCY_KEY_REUSED";
    case SimulationOnboardingConcurrencyLimited = "SIMULATION_ONBOARDING_CONCURRENCY_LIMITED";
    case SimulationOnboardingQuotaExceeded = "SIMULATION_ONBOARDING_QUOTA_EXCEEDED";
    case SimulationOnboardingQuotaUnavailable = "SIMULATION_ONBOARDING_QUOTA_UNAVAILABLE";
}
