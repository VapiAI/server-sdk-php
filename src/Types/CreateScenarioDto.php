<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CreateScenarioDto extends JsonSerializableType
{
    /**
     * @var string $name The display name of the scenario, for example `Book an appointment`.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $instructions What the AI tester should try to accomplish in the conversation. Write it as the AI tester's goal, for example `Book an appointment for next week and confirm the time.`
     */
    #[JsonProperty('instructions')]
    public string $instructions;

    /**
     * @var array<EvaluationPlanItem> $evaluations The checks that decide whether a run passes. Each evaluation compares a structured output against an expected value. At least one evaluation is required to run.
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
     * @var ?array<ScenarioToolMock> $toolMocks Mock results for the assistant or squad's tools during the simulation, so the run stays deterministic without calling real services.
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
