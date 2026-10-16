<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class LatencyEvaluationResult extends JsonSerializableType
{
    /**
     * @var value-of<LatencyEvaluationResultMetric> $metric This is the latency component that was measured.
     */
    #[JsonProperty('metric')]
    public string $metric;

    /**
     * @var value-of<LatencyEvaluationResultAggregation> $aggregation This is how the per-turn latencies were aggregated.
     */
    #[JsonProperty('aggregation')]
    public string $aggregation;

    /**
     * @var float $thresholdMs This is the ceiling in milliseconds the aggregated latency was compared against.
     */
    #[JsonProperty('thresholdMs')]
    public float $thresholdMs;

    /**
     * This is the aggregated latency in milliseconds, rounded to the nearest
     * millisecond. The pass/fail verdict is decided on this rounded value.
     * Absent when the expectation was skipped or no turn measured this metric.
     *
     * @var ?float $actualMs
     */
    #[JsonProperty('actualMs')]
    public ?float $actualMs;

    /**
     * @var float $sampleCount This is the number of turns that contributed a value for this metric.
     */
    #[JsonProperty('sampleCount')]
    public float $sampleCount;

    /**
     * @var bool $passed This indicates whether the aggregated latency was at or below the threshold.
     */
    #[JsonProperty('passed')]
    public bool $passed;

    /**
     * @var bool $required This indicates whether this expectation was required for the simulation to pass.
     */
    #[JsonProperty('required')]
    public bool $required;

    /**
     * This indicates whether this expectation was skipped. Expectations are only
     * skipped on chat simulations and GPT Live targets, which record no latency.
     *
     * @var ?bool $isSkipped
     */
    #[JsonProperty('isSkipped')]
    public ?bool $isSkipped;

    /**
     * @var ?string $skipReason This contains the reason for skipping the expectation.
     */
    #[JsonProperty('skipReason')]
    public ?string $skipReason;

    /**
     * @param array{
     *   metric: value-of<LatencyEvaluationResultMetric>,
     *   aggregation: value-of<LatencyEvaluationResultAggregation>,
     *   thresholdMs: float,
     *   sampleCount: float,
     *   passed: bool,
     *   required: bool,
     *   actualMs?: ?float,
     *   isSkipped?: ?bool,
     *   skipReason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->metric = $values['metric'];
        $this->aggregation = $values['aggregation'];
        $this->thresholdMs = $values['thresholdMs'];
        $this->actualMs = $values['actualMs'] ?? null;
        $this->sampleCount = $values['sampleCount'];
        $this->passed = $values['passed'];
        $this->required = $values['required'];
        $this->isSkipped = $values['isSkipped'] ?? null;
        $this->skipReason = $values['skipReason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
