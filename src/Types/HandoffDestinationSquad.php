<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class HandoffDestinationSquad extends JsonSerializableType
{
    /**
     * @var ?HandoffDestinationSquadContextEngineeringPlan $contextEngineeringPlan This is the plan for manipulating the message context before handing off the call to the squad.
     */
    #[JsonProperty('contextEngineeringPlan')]
    public ?HandoffDestinationSquadContextEngineeringPlan $contextEngineeringPlan;

    /**
     * @var ?string $squadId This is the squad id to transfer the call to.
     */
    #[JsonProperty('squadId')]
    public ?string $squadId;

    /**
     * @var ?CreateSquadDto $squad This is a transient squad to transfer the call to.
     */
    #[JsonProperty('squad')]
    public ?CreateSquadDto $squad;

    /**
     * This is the name of the entry assistant to start with when handing off to the squad.
     * If not provided, the first member of the squad will be used.
     *
     * @var ?string $entryAssistantName
     */
    #[JsonProperty('entryAssistantName')]
    public ?string $entryAssistantName;

    /**
     * @var ?VariableExtractionPlan $variableExtractionPlan This is the variable extraction plan for the handoff tool.
     */
    #[JsonProperty('variableExtractionPlan')]
    public ?VariableExtractionPlan $variableExtractionPlan;

    /**
     * These are the overrides to apply to the squad configuration.
     * Maps to squad-level membersOverrides.
     *
     * @var ?AssistantOverrides $squadOverrides
     */
    #[JsonProperty('squadOverrides')]
    public ?AssistantOverrides $squadOverrides;

    /**
     * @var ?string $description This is the description of the destination, used by the AI to choose when and how to transfer the call.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @param array{
     *   contextEngineeringPlan?: ?HandoffDestinationSquadContextEngineeringPlan,
     *   squadId?: ?string,
     *   squad?: ?CreateSquadDto,
     *   entryAssistantName?: ?string,
     *   variableExtractionPlan?: ?VariableExtractionPlan,
     *   squadOverrides?: ?AssistantOverrides,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contextEngineeringPlan = $values['contextEngineeringPlan'] ?? null;
        $this->squadId = $values['squadId'] ?? null;
        $this->squad = $values['squad'] ?? null;
        $this->entryAssistantName = $values['entryAssistantName'] ?? null;
        $this->variableExtractionPlan = $values['variableExtractionPlan'] ?? null;
        $this->squadOverrides = $values['squadOverrides'] ?? null;
        $this->description = $values['description'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
