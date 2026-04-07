<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationRunSuiteEntry extends JsonSerializableType
{
    /**
     * @var ?string $simulationSuiteId ID of the simulation suite to run
     */
    #[JsonProperty('simulationSuiteId')]
    public ?string $simulationSuiteId;

    /**
     * @var ?string $suiteId
     */
    #[JsonProperty('suiteId')]
    public ?string $suiteId;

    /**
     * @param array{
     *   simulationSuiteId?: ?string,
     *   suiteId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->simulationSuiteId = $values['simulationSuiteId'] ?? null;
        $this->suiteId = $values['suiteId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
