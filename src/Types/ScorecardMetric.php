<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use Vapi\Core\Types\Union;

/**
 * A scorecard metric that awards points when a structured output meets its configured conditions.
 */
class ScorecardMetric extends JsonSerializableType
{
    /**
     * These are the conditions that will be used to evaluate the scorecard.
     * Each condition will have a comparator, value, and points that will be used to calculate the final score.
     * The points will be added to the overall score if the condition is met.
     * The overall score will be normalized to a 100 point scale to ensure uniformity across different scorecards.
     *
     * @var array<(
     *    NumberComparatorScorecardMetricCondition
     *   |BooleanComparatorScorecardMetricCondition
     * )> $conditions
     */
    #[JsonProperty('conditions'), ArrayType([new Union(NumberComparatorScorecardMetricCondition::class, BooleanComparatorScorecardMetricCondition::class)])]
    public array $conditions;

    /**
     * This is the unique identifier for the structured output that will be used to evaluate the scorecard.
     * The structured output must be of type number or boolean only for now.
     *
     * @var string $structuredOutputId
     */
    #[JsonProperty('structuredOutputId')]
    public string $structuredOutputId;

    /**
     * @param array{
     *   conditions: array<(
     *    NumberComparatorScorecardMetricCondition
     *   |BooleanComparatorScorecardMetricCondition
     * )>,
     *   structuredOutputId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conditions = $values['conditions'];
        $this->structuredOutputId = $values['structuredOutputId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
