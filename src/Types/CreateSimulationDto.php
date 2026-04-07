<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CreateSimulationDto extends JsonSerializableType
{
    /**
     * @var ?string $name This is an optional friendly name for the simulation.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var string $scenarioId This is the ID of the scenario to use for this simulation.
     */
    #[JsonProperty('scenarioId')]
    public string $scenarioId;

    /**
     * @var string $personalityId This is the ID of the personality to use for this simulation.
     */
    #[JsonProperty('personalityId')]
    public string $personalityId;

    /**
     * Optional folder path for organizing simulations.
     * Supports up to 3 levels (e.g., "dept/feature/variant").
     * Maps to GitOps resource folder structure.
     *
     * @var ?string $path
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @param array{
     *   scenarioId: string,
     *   personalityId: string,
     *   name?: ?string,
     *   path?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'] ?? null;
        $this->scenarioId = $values['scenarioId'];
        $this->personalityId = $values['personalityId'];
        $this->path = $values['path'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
