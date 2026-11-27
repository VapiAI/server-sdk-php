<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationOnboardingSuiteEditDto extends JsonSerializableType
{
    /**
     * @var string $simulationId Simulation in the suite whose scenario is rewritten.
     */
    #[JsonProperty('simulationId')]
    public string $simulationId;

    /**
     * @var string $instruction Natural-language instructions for revising this simulation's scenario, such as "Have the caller ask for a refund after 30 days."
     */
    #[JsonProperty('instruction')]
    public string $instruction;

    /**
     * @param array{
     *   simulationId: string,
     *   instruction: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->simulationId = $values['simulationId'];
        $this->instruction = $values['instruction'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
