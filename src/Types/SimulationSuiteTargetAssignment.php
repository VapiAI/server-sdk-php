<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationSuiteTargetAssignment extends JsonSerializableType
{
    /**
     * @var value-of<SimulationSuiteTargetAssignmentTargetType> $targetType This is the type of target assigned to the simulation suite.
     */
    #[JsonProperty('targetType')]
    public string $targetType;

    /**
     * @var string $targetId This is the unique identifier of the assigned assistant or squad.
     */
    #[JsonProperty('targetId')]
    public string $targetId;

    /**
     * @param array{
     *   targetType: value-of<SimulationSuiteTargetAssignmentTargetType>,
     *   targetId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->targetType = $values['targetType'];
        $this->targetId = $values['targetId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
