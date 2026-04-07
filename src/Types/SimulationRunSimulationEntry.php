<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationRunSimulationEntry extends JsonSerializableType
{
    /**
     * @var ?string $simulationId ID of an existing simulation to run. When provided, scenarioId/personalityId/inline fields are ignored.
     */
    #[JsonProperty('simulationId')]
    public ?string $simulationId;

    /**
     * @var ?string $scenarioId ID of an existing scenario. Cannot be combined with inline scenario.
     */
    #[JsonProperty('scenarioId')]
    public ?string $scenarioId;

    /**
     * @var ?CreateScenarioDto $scenario Inline scenario configuration. Cannot be combined with scenarioId.
     */
    #[JsonProperty('scenario')]
    public ?CreateScenarioDto $scenario;

    /**
     * @var ?string $personalityId ID of an existing personality. Cannot be combined with inline personality.
     */
    #[JsonProperty('personalityId')]
    public ?string $personalityId;

    /**
     * @var ?CreatePersonalityDto $personality Inline personality configuration. Cannot be combined with personalityId.
     */
    #[JsonProperty('personality')]
    public ?CreatePersonalityDto $personality;

    /**
     * @var ?string $name Optional name for this simulation entry
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   simulationId?: ?string,
     *   scenarioId?: ?string,
     *   scenario?: ?CreateScenarioDto,
     *   personalityId?: ?string,
     *   personality?: ?CreatePersonalityDto,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->simulationId = $values['simulationId'] ?? null;
        $this->scenarioId = $values['scenarioId'] ?? null;
        $this->scenario = $values['scenario'] ?? null;
        $this->personalityId = $values['personalityId'] ?? null;
        $this->personality = $values['personality'] ?? null;
        $this->name = $values['name'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
