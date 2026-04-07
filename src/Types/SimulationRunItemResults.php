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
     * @var bool $passed This indicates whether all required evaluations passed.
     */
    #[JsonProperty('passed')]
    public bool $passed;

    /**
     * @var ?LatencyMetrics $latencyMetrics This contains the latency metrics collected from the call.
     */
    #[JsonProperty('latencyMetrics')]
    public ?LatencyMetrics $latencyMetrics;

    /**
     * @param array{
     *   evaluations: array<StructuredOutputEvaluationResult>,
     *   passed: bool,
     *   latencyMetrics?: ?LatencyMetrics,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->evaluations = $values['evaluations'];
        $this->passed = $values['passed'];
        $this->latencyMetrics = $values['latencyMetrics'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
