<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TranscriptMetricEvaluationResult extends JsonSerializableType
{
    /**
     * @var float $index This is the evaluation's position in the scenario's evaluations.
     */
    #[JsonProperty('index')]
    public float $index;

    /**
     * @var value-of<TranscriptMetricEvaluationResultMetric> $metric This is the metric evaluated.
     */
    #[JsonProperty('metric')]
    public string $metric;

    /**
     * @var value-of<TranscriptMetricEvaluationResultComparator> $comparator This is the comparison made: the metric's value on the left, `expectedValue` on the right.
     */
    #[JsonProperty('comparator')]
    public string $comparator;

    /**
     * @var float $expectedValue This is the value the evaluation compares against.
     */
    #[JsonProperty('expectedValue')]
    public float $expectedValue;

    /**
     * This is the metric's value for this run. Null when it could not be measured, such as a word error rate for an
     * answer key with no words; the evaluation then fails.
     *
     * @var ?float $actualValue
     */
    #[JsonProperty('actualValue')]
    public ?float $actualValue;

    /**
     * @var bool $passed This is whether the comparison held.
     */
    #[JsonProperty('passed')]
    public bool $passed;

    /**
     * @var bool $required This is whether the evaluation decides pass or fail. When false it is informational only.
     */
    #[JsonProperty('required')]
    public bool $required;

    /**
     * @param array{
     *   index: float,
     *   metric: value-of<TranscriptMetricEvaluationResultMetric>,
     *   comparator: value-of<TranscriptMetricEvaluationResultComparator>,
     *   expectedValue: float,
     *   passed: bool,
     *   required: bool,
     *   actualValue?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->index = $values['index'];
        $this->metric = $values['metric'];
        $this->comparator = $values['comparator'];
        $this->expectedValue = $values['expectedValue'];
        $this->actualValue = $values['actualValue'] ?? null;
        $this->passed = $values['passed'];
        $this->required = $values['required'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
