<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationRunConfiguration extends JsonSerializableType
{
    /**
     * @var ?bool $includeTargetStructuredOutputs Generate directly attached target structured outputs. Default false. Enabled extraction may incur additional model charges.
     */
    #[JsonProperty('includeTargetStructuredOutputs')]
    public ?bool $includeTargetStructuredOutputs;

    /**
     * @var ?SimulationRunTransportConfiguration $transport Transport configuration for the simulation run
     */
    #[JsonProperty('transport')]
    public ?SimulationRunTransportConfiguration $transport;

    /**
     * @param array{
     *   includeTargetStructuredOutputs?: ?bool,
     *   transport?: ?SimulationRunTransportConfiguration,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->includeTargetStructuredOutputs = $values['includeTargetStructuredOutputs'] ?? null;
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
