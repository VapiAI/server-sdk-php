<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class OrgConcurrencyLimitsDto extends JsonSerializableType
{
    /**
     * @var bool $concurrencyBlocked True when the org is at or over its concurrency limit at the time of the read. This is a status read, not an admission decision: no call was evaluated and no slot is reserved.
     */
    #[JsonProperty('concurrencyBlocked')]
    public bool $concurrencyBlocked;

    /**
     * @var float $concurrencyLimit Maximum number of concurrent calls the subscription allows, at the time of the read. Computed as the subscription's included plus purchased concurrency, defaulting to the initial allowance when either is unset; call create derives its own figure and can differ for subscriptions with an unset allowance.
     */
    #[JsonProperty('concurrencyLimit')]
    public float $concurrencyLimit;

    /**
     * @var float $remainingConcurrentCalls Plain concurrent-call headroom at the time of the read, floored at zero. Unlike the call create response, this does not include or reserve a slot for a new call.
     */
    #[JsonProperty('remainingConcurrentCalls')]
    public float $remainingConcurrentCalls;

    /**
     * @param array{
     *   concurrencyBlocked: bool,
     *   concurrencyLimit: float,
     *   remainingConcurrentCalls: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->concurrencyBlocked = $values['concurrencyBlocked'];
        $this->concurrencyLimit = $values['concurrencyLimit'];
        $this->remainingConcurrentCalls = $values['remainingConcurrentCalls'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
