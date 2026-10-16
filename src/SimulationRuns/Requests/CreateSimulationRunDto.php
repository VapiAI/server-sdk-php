<?php

namespace Vapi\SimulationRuns\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\SimulationRuns\Types\CreateSimulationRunDtoSimulationsItem;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use Vapi\SimulationRuns\Types\CreateSimulationRunDtoTarget;
use Vapi\Types\SimulationRunTransportConfiguration;

class CreateSimulationRunDto extends JsonSerializableType
{
    /**
     * @var ?string $idempotencyKey Makes the request safe to retry. A retry with the same key and the same body returns the run the first request created, with `reused: true`, instead of starting another. Reusing a key with a different body returns 409. Up to 255 printable ASCII characters, scoped to your organization; a key stays bound to its run while the run exists.
     */
    public ?string $idempotencyKey;

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
     *   idempotencyKey?: ?string,
     *   iterations?: ?float,
     *   transport?: ?SimulationRunTransportConfiguration,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->simulations = $values['simulations'];
        $this->target = $values['target'];
        $this->iterations = $values['iterations'] ?? null;
        $this->transport = $values['transport'] ?? null;
    }
}
