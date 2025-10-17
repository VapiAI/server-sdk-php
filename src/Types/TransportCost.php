<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TransportCost extends JsonSerializableType
{
    /**
     * @var ?value-of<TransportCostProvider> $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var float $minutes This is the minutes of `transport` usage. This should match `call.endedAt` - `call.startedAt`.
     */
    #[JsonProperty('minutes')]
    public float $minutes;

    /**
     * @var float $cost This is the cost of the component in USD.
     */
    #[JsonProperty('cost')]
    public float $cost;

    /**
     * @param array{
     *   minutes: float,
     *   cost: float,
     *   provider?: ?value-of<TransportCostProvider>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->provider = $values['provider'] ?? null;
        $this->minutes = $values['minutes'];
        $this->cost = $values['cost'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
