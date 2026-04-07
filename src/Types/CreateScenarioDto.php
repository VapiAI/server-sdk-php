<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CreateScenarioDto extends JsonSerializableType
{
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
     * @var ?array<CreateScenarioDtoHooksItem> $hooks Hooks to run on simulation lifecycle events
     */
    #[JsonProperty('hooks'), ArrayType([CreateScenarioDtoHooksItem::class])]
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
     *   name: string,
     *   instructions: string,
     *   evaluations: array<EvaluationPlanItem>,
     *   hooks?: ?array<CreateScenarioDtoHooksItem>,
     *   targetOverrides?: ?AssistantOverrides,
     *   toolMocks?: ?array<ScenarioToolMock>,
     *   path?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
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
