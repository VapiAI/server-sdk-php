<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SimulationRunItemResults extends JsonSerializableType
{
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
     *   latencyMetrics?: ?LatencyMetrics,
     *   latencyEvaluations?: ?array<LatencyEvaluationResult>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
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
