<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * Controls retry behavior for failed server requests, including strategy, maximum retries, base delay, and status codes excluded from retries.
 */
class BackoffPlan extends JsonSerializableType
{
    /**
     * This is the type of backoff plan to use. Defaults to fixed.
     *
     * @default fixed
     *
     * @var array<string, mixed> $type
     */
    #[JsonProperty('type'), ArrayType(['string' => 'mixed'])]
    public array $type;

    /**
     * This is the maximum number of retries to attempt if the request fails. Defaults to 0 (no retries).
     *
     * @default 0
     *
     * @var float $maxRetries
     */
    #[JsonProperty('maxRetries')]
    public float $maxRetries;

    /**
     * @var float $baseDelaySeconds Base delay in seconds. For fixed backoff, this is the delay between retries. For exponential backoff, this is the initial delay.
     */
    #[JsonProperty('baseDelaySeconds')]
    public float $baseDelaySeconds;

    /**
     * @var ?array<array<string, mixed>> $excludedStatusCodes HTTP status codes that should not trigger a retry. By default, any non-2xx status code not listed here can be retried.
     */
    #[JsonProperty('excludedStatusCodes'), ArrayType([['string' => 'mixed']])]
    public ?array $excludedStatusCodes;

    /**
     * @param array{
     *   type: array<string, mixed>,
     *   maxRetries: float,
     *   baseDelaySeconds: float,
     *   excludedStatusCodes?: ?array<array<string, mixed>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->maxRetries = $values['maxRetries'];
        $this->baseDelaySeconds = $values['baseDelaySeconds'];
        $this->excludedStatusCodes = $values['excludedStatusCodes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
