<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;
use Vapi\Core\Types\ArrayType;

class Scenario extends JsonSerializableType
{
    /**
     * @var string $id This is the unique identifier for the scenario.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId This is the unique identifier for the organization this scenario belongs to.
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var DateTime $createdAt This is the ISO 8601 date-time string of when the scenario was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt This is the ISO 8601 date-time string of when the scenario was last updated.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var string $name This is the name of the scenario.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $instructions This is the script/instructions for the tester to follow during the simulation.
     */
    #[JsonProperty('instructions')]
    public string $instructions;

    /**
     * This is the structured output-based evaluation plan for the simulation.
     * Each item defines a structured output to extract and evaluate against an expected value.
     *
     * @var array<EvaluationPlanItem> $evaluations
     */
    #[JsonProperty('evaluations'), ArrayType([EvaluationPlanItem::class])]
    public array $evaluations;

    /**
     * @var ?array<ScenarioHooksItem> $hooks Hooks to run on simulation lifecycle events
     */
    #[JsonProperty('hooks'), ArrayType([ScenarioHooksItem::class])]
    public ?array $hooks;

    /**
     * @var ?AssistantOverrides $targetOverrides Overrides to inject into the simulated target assistant or squad
     */
    #[JsonProperty('targetOverrides')]
    public ?AssistantOverrides $targetOverrides;

    /**
     * @var ?array<ScenarioToolMock> $toolMocks Scenario-level tool call mocks to use during simulations.
     */
    #[JsonProperty('toolMocks'), ArrayType([ScenarioToolMock::class])]
    public ?array $toolMocks;

    /**
     * Optional folder path for organizing scenarios.
     * Supports up to 3 levels (e.g., "dept/feature/variant").
     * Maps to GitOps resource folder structure.
     *
     * @var ?string $path
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @param array{
     *   id: string,
     *   orgId: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   name: string,
     *   instructions: string,
     *   evaluations: array<EvaluationPlanItem>,
     *   hooks?: ?array<ScenarioHooksItem>,
     *   targetOverrides?: ?AssistantOverrides,
     *   toolMocks?: ?array<ScenarioToolMock>,
     *   path?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->name = $values['name'];
        $this->instructions = $values['instructions'];
        $this->evaluations = $values['evaluations'];
        $this->hooks = $values['hooks'] ?? null;
        $this->targetOverrides = $values['targetOverrides'] ?? null;
        $this->toolMocks = $values['toolMocks'] ?? null;
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
