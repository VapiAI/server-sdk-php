<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class LatencyExpectation extends JsonSerializableType
{
    /**
     * This is the latency component to measure.
     * - turn: total time from the end of user speech to the start of assistant speech
     * - model: LLM time to first token
     * - voice: TTS time to first audio
     *
     * @var value-of<LatencyExpectationMetric> $metric
     */
    #[JsonProperty('metric')]
    public string $metric;

    /**
     * This is how the call's per-turn latencies are aggregated before comparing.
     * p95 uses the nearest-rank method, so on calls with fewer than 20 turns it
     * equals the max.
     *
     * @var value-of<LatencyExpectationAggregation> $aggregation
     */
    #[JsonProperty('aggregation')]
    public string $aggregation;

    /**
     * This is the ceiling in milliseconds. The expectation passes when the
     * aggregated latency is less than or equal to this value.
     *
     * @var float $thresholdMs
     */
    #[JsonProperty('thresholdMs')]
    public float $thresholdMs;

    /**
     * This is whether this expectation must pass for the simulation to pass.
     * Defaults to true. If false, the result is informational only.
     * On a voice simulation, a metric that no turn measured fails the expectation.
     * GPT Live targets are skipped, because their latency is not measured yet.
     *
     * @var ?bool $required
     */
    #[JsonProperty('required')]
    public ?bool $required;

    /**
     * @param array{
     *   metric: value-of<LatencyExpectationMetric>,
     *   aggregation: value-of<LatencyExpectationAggregation>,
     *   thresholdMs: float,
     *   required?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->metric = $values['metric'];
        $this->aggregation = $values['aggregation'];
        $this->thresholdMs = $values['thresholdMs'];
        $this->required = $values['required'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
