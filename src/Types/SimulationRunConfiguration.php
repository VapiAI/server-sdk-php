<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationRunConfiguration extends JsonSerializableType
{
    /**
     * @var ?SimulationRunTransportConfiguration $transport Transport configuration for the simulation run
     */
    #[JsonProperty('transport')]
    public ?SimulationRunTransportConfiguration $transport;

    /**
     * @param array{
     *   transport?: ?SimulationRunTransportConfiguration,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->transport = $values['transport'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
