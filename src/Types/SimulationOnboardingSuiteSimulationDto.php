<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SimulationOnboardingSuiteSimulationDto extends JsonSerializableType
{
    /**
     * @var string $id Simulation id; pass it back to edit or remove the simulation.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $scenarioId Scenario the simulation runs.
     */
    #[JsonProperty('scenarioId')]
    public string $scenarioId;

    /**
     * @var string $name Scenario name.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $personalityName Name of the simulated caller's personality.
     */
    #[JsonProperty('personalityName')]
    public ?string $personalityName;

    /**
     * @var array<string> $successCriteria Each success criterion, as the yes/no question it is judged by.
     */
    #[JsonProperty('successCriteria'), ArrayType(['string'])]
    public array $successCriteria;

    /**
     * @var array<string> $requirementIds Requirement ids this simulation covers, e.g. `R3`.
     */
    #[JsonProperty('requirementIds'), ArrayType(['string'])]
    public array $requirementIds;

    /**
     * @var array<string> $mockedTools Tools the scenario mocks.
     */
    #[JsonProperty('mockedTools'), ArrayType(['string'])]
    public array $mockedTools;

    /**
     * @param array{
     *   id: string,
     *   scenarioId: string,
     *   name: string,
     *   successCriteria: array<string>,
     *   requirementIds: array<string>,
     *   mockedTools: array<string>,
     *   personalityName?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->scenarioId = $values['scenarioId'];
        $this->name = $values['name'];
        $this->personalityName = $values['personalityName'] ?? null;
        $this->successCriteria = $values['successCriteria'];
        $this->requirementIds = $values['requirementIds'];
        $this->mockedTools = $values['mockedTools'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
