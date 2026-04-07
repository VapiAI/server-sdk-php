<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SubscriptionLimits extends JsonSerializableType
{
    /**
     * @var ?bool $concurrencyBlocked True if this call was blocked by the Call Concurrency limit
     */
    #[JsonProperty('concurrencyBlocked')]
    public ?bool $concurrencyBlocked;

    /**
     * @var ?float $concurrencyLimit Account Call Concurrency limit
     */
    #[JsonProperty('concurrencyLimit')]
    public ?float $concurrencyLimit;

    /**
     * @var ?float $remainingConcurrentCalls Incremental number of concurrent calls that will be allowed, including this call
     */
    #[JsonProperty('remainingConcurrentCalls')]
    public ?float $remainingConcurrentCalls;

    /**
     * @param array{
     *   concurrencyBlocked?: ?bool,
     *   concurrencyLimit?: ?float,
     *   remainingConcurrentCalls?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->concurrencyBlocked = $values['concurrencyBlocked'] ?? null;
        $this->concurrencyLimit = $values['concurrencyLimit'] ?? null;
        $this->remainingConcurrentCalls = $values['remainingConcurrentCalls'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
