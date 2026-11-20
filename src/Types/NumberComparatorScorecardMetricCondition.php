<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class NumberComparatorScorecardMetricCondition extends JsonSerializableType
{
    /**
     * @var value-of<NumberComparatorScorecardMetricConditionType> $type This is the type of the condition. Currently only 'comparator' is supported.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * This is the comparator that will be used to compare the result of the structured output with the value specified.
     * Only '=', '!=', '>', '<', '>=', and '<=' are supported for number conditions
     * Only '=' is supported for boolean conditions.
     *
     * @var value-of<NumberComparatorScorecardMetricConditionComparator> $comparator
     */
    #[JsonProperty('comparator')]
    public string $comparator;

    /**
     * This is the value that will be used to compare the result of the structured output with the comparator.
     * If the result of the comparison is true, the points will be added to the overall score.
     *
     * @var float $value
     */
    #[JsonProperty('value')]
    public float $value;

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
     *   type: value-of<NumberComparatorScorecardMetricConditionType>,
     *   comparator: value-of<NumberComparatorScorecardMetricConditionComparator>,
     *   value: float,
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
