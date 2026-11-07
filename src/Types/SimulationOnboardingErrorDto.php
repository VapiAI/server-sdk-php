<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationOnboardingErrorDto extends JsonSerializableType
{
    /**
     * @var value-of<SimulationOnboardingErrorDtoCode> $code Which refusal this is. Retry `SIMULATION_ONBOARDING_GENERATION_IN_PROGRESS` with the same key and `SIMULATION_ONBOARDING_CONCURRENCY_LIMITED` or `SIMULATION_ONBOARDING_QUOTA_UNAVAILABLE` after `retryAfterSeconds`, send a new key for `SIMULATION_ONBOARDING_IDEMPOTENCY_KEY_REUSED`, and stop for `SIMULATION_ONBOARDING_QUOTA_EXCEEDED`.
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * @var string $message What happened, written for the user.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var ?float $retryAfterSeconds Seconds to wait before retrying, the same value as the `Retry-After` header. For a daily limit, the seconds until 00:00 UTC.
     */
    #[JsonProperty('retryAfterSeconds')]
    public ?float $retryAfterSeconds;

    /**
     * @var ?float $limit The daily limit that was reached, on a daily-limit refusal only.
     */
    #[JsonProperty('limit')]
    public ?float $limit;

    /**
     * @param array{
     *   code: value-of<SimulationOnboardingErrorDtoCode>,
     *   message: string,
     *   retryAfterSeconds?: ?float,
     *   limit?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'];
        $this->message = $values['message'];
        $this->retryAfterSeconds = $values['retryAfterSeconds'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
