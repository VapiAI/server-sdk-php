<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SimulationRunItemResults extends JsonSerializableType
{
    /**
     * @var ?array<string, SimulationRunItemResultsStructuredOutputsValue> $structuredOutputs Retention-permitted target extraction values, present only when enabled.
     */
    #[JsonProperty('structuredOutputs'), ArrayType(['string' => SimulationRunItemResultsStructuredOutputsValue::class])]
    public ?array $structuredOutputs;

    /**
     * @var ?array<string, SimulationRunItemResultsSkippedStructuredOutputsValue> $skippedStructuredOutputs Condition-gated outputs or audio outputs unsupported by chat.
     */
    #[JsonProperty('skippedStructuredOutputs'), ArrayType(['string' => SimulationRunItemResultsSkippedStructuredOutputsValue::class])]
    public ?array $skippedStructuredOutputs;

    /**
     * @var ?string $structuredOutputError Sanitized diagnostic; optional target extraction never changes pass/fail.
     */
    #[JsonProperty('structuredOutputError')]
    public ?string $structuredOutputError;

    /**
     * @var array<StructuredOutputEvaluationResult> $evaluations This is the list of results from structured output evaluations.
     */
    #[JsonProperty('evaluations'), ArrayType([StructuredOutputEvaluationResult::class])]
    public array $evaluations;

    /**
     * @var bool $passed This indicates whether all required, non-skipped structured output evaluations and latency expectations passed.
     */
    #[JsonProperty('passed')]
    public bool $passed;

    /**
     * @var ?LatencyMetrics $latencyMetrics This contains the latency metrics collected from the call.
     */
    #[JsonProperty('latencyMetrics')]
    public ?LatencyMetrics $latencyMetrics;

    /**
     * This is the list of results from the scenario's latency expectations.
     * Absent when the scenario has no latency expectations.
     *
     * @var ?array<LatencyEvaluationResult> $latencyEvaluations
     */
    #[JsonProperty('latencyEvaluations'), ArrayType([LatencyEvaluationResult::class])]
    public ?array $latencyEvaluations;

    /**
     * @param array{
     *   evaluations: array<StructuredOutputEvaluationResult>,
     *   passed: bool,
     *   structuredOutputs?: ?array<string, SimulationRunItemResultsStructuredOutputsValue>,
     *   skippedStructuredOutputs?: ?array<string, SimulationRunItemResultsSkippedStructuredOutputsValue>,
     *   structuredOutputError?: ?string,
     *   latencyMetrics?: ?LatencyMetrics,
     *   latencyEvaluations?: ?array<LatencyEvaluationResult>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->structuredOutputs = $values['structuredOutputs'] ?? null;
        $this->skippedStructuredOutputs = $values['skippedStructuredOutputs'] ?? null;
        $this->structuredOutputError = $values['structuredOutputError'] ?? null;
        $this->evaluations = $values['evaluations'];
        $this->passed = $values['passed'];
        $this->latencyMetrics = $values['latencyMetrics'] ?? null;
        $this->latencyEvaluations = $values['latencyEvaluations'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
