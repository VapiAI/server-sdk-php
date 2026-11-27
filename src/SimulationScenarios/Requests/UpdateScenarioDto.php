<?php

namespace Vapi\SimulationScenarios\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Types\EvaluationPlanItem;
use Vapi\Core\Types\ArrayType;
use Vapi\SimulationScenarios\Types\UpdateScenarioDtoHooksItem;
use Vapi\Types\AssistantOverrides;
use Vapi\Types\ScenarioToolMock;
use Vapi\Types\LatencyExpectation;
use Vapi\Types\TranscriptReplay;

class UpdateScenarioDto extends JsonSerializableType
{
    /**
     * @var ?string $name This is the name of the scenario.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $instructions This is the script/instructions for the tester to follow during the simulation.
     */
    #[JsonProperty('instructions')]
    public ?string $instructions;

    /**
     * This is the evaluation plan for the simulation.
     * Each item defines a structured output to extract, or with `transcriptReplay` a built-in metric, and evaluates it
     * against an expected value.
     *
     * @var ?array<EvaluationPlanItem> $evaluations
     */
    #[JsonProperty('evaluations'), ArrayType([EvaluationPlanItem::class])]
    public ?array $evaluations;

    /**
     * @var ?array<UpdateScenarioDtoHooksItem> $hooks Hooks to run on simulation lifecycle events
     */
    #[JsonProperty('hooks'), ArrayType([UpdateScenarioDtoHooksItem::class])]
    public ?array $hooks;

    /**
     * @var ?AssistantOverrides $targetOverrides Complete override replacement. Omitted credentials and redacted server secrets are preserved when their endpoint URL is unchanged. Send credentials: [] to clear credentials; omit a server container to remove it.
     */
    #[JsonProperty('targetOverrides')]
    public ?AssistantOverrides $targetOverrides;

    /**
     * @var ?array<ScenarioToolMock> $toolMocks
     */
    #[JsonProperty('toolMocks'), ArrayType([ScenarioToolMock::class])]
    public ?array $toolMocks;

    /**
     * Latency ceilings for voice simulations. Omit to leave unchanged; send an
     * empty array to remove all latency expectations.
     *
     * @var ?array<LatencyExpectation> $latencyExpectations
     */
    #[JsonProperty('latencyExpectations'), ArrayType([LatencyExpectation::class])]
    public ?array $latencyExpectations;

    /**
     * Transcript replay settings. Omit to leave unchanged; send null to turn the
     * scenario back into a normal simulation, which then needs instructions and
     * at least one evaluation. Turning a scenario into a replay needs
     * `evaluations: []` in the same request.
     *
     * @var ?TranscriptReplay $transcriptReplay
     */
    #[JsonProperty('transcriptReplay')]
    public ?TranscriptReplay $transcriptReplay;

    /**
     * Optional folder path for organizing scenarios.
     * Supports up to 3 levels (e.g., "dept/feature/variant").
     * Set to null to remove from folder.
     *
     * @var ?string $path
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @param array{
     *   name?: ?string,
     *   instructions?: ?string,
     *   evaluations?: ?array<EvaluationPlanItem>,
     *   hooks?: ?array<UpdateScenarioDtoHooksItem>,
     *   targetOverrides?: ?AssistantOverrides,
     *   toolMocks?: ?array<ScenarioToolMock>,
     *   latencyExpectations?: ?array<LatencyExpectation>,
     *   transcriptReplay?: ?TranscriptReplay,
     *   path?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->instructions = $values['instructions'] ?? null;
        $this->evaluations = $values['evaluations'] ?? null;
        $this->hooks = $values['hooks'] ?? null;
        $this->targetOverrides = $values['targetOverrides'] ?? null;
        $this->toolMocks = $values['toolMocks'] ?? null;
        $this->latencyExpectations = $values['latencyExpectations'] ?? null;
        $this->transcriptReplay = $values['transcriptReplay'] ?? null;
        $this->path = $values['path'] ?? null;
    }
}
