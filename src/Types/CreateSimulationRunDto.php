<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CreateSimulationRunDto extends JsonSerializableType
{
    /**
     * @var array<CreateSimulationRunDtoSimulationsItem> $simulations Array of simulations and/or suites to run
     */
    #[JsonProperty('simulations'), ArrayType([CreateSimulationRunDtoSimulationsItem::class])]
    public array $simulations;

    /**
     * @var CreateSimulationRunDtoTarget $target Target to test against
     */
    #[JsonProperty('target')]
    public CreateSimulationRunDtoTarget $target;

    /**
     * @var ?float $iterations Number of times to run each simulation (default: 1)
     */
    #[JsonProperty('iterations')]
    public ?float $iterations;

    /**
     * @var ?SimulationRunTransportConfiguration $transport Transport configuration for the simulation runs
     */
    #[JsonProperty('transport')]
    public ?SimulationRunTransportConfiguration $transport;

    /**
     * @param array{
     *   simulations: array<CreateSimulationRunDtoSimulationsItem>,
     *   target: CreateSimulationRunDtoTarget,
     *   iterations?: ?float,
     *   transport?: ?SimulationRunTransportConfiguration,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->simulations = $values['simulations'];
        $this->target = $values['target'];
        $this->iterations = $values['iterations'] ?? null;
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
