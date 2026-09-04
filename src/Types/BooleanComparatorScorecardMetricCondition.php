<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class BooleanComparatorScorecardMetricCondition extends JsonSerializableType
{
    /**
     * @var value-of<BooleanComparatorScorecardMetricConditionType> $type This is the type of the condition. Currently only 'comparator' is supported.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var value-of<BooleanComparatorScorecardMetricConditionComparator> $comparator The comparator can only be '=' for boolean conditions.
     */
    #[JsonProperty('comparator')]
    public string $comparator;

    /**
     * This is the value that will be used to compare the result of the structured output with the comparator.
     * If the result of the comparison is true, the points will be added to the overall score.
     *
     * @var bool $value
     */
    #[JsonProperty('value')]
    public bool $value;

    /**
     * These are the points that will be added to the overall score if the condition is met.
     * The points must be between 0 and 100.
     *
     * @var float $points
     */
    #[JsonProperty('points')]
    public float $points;

    /**
     * @param array{
     *   type: value-of<BooleanComparatorScorecardMetricConditionType>,
     *   comparator: value-of<BooleanComparatorScorecardMetricConditionComparator>,
     *   value: bool,
     *   points: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->comparator = $values['comparator'];
        $this->value = $values['value'];
        $this->points = $values['points'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
