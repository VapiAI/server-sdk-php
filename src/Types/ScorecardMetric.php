<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class ScorecardMetric extends JsonSerializableType
{
    /**
     * This is the unique identifier for the structured output that will be used to evaluate the scorecard.
     * The structured output must be of type number or boolean only for now.
     *
     * @var string $structuredOutputId
     */
    #[JsonProperty('structuredOutputId')]
    public string $structuredOutputId;

    /**
     * These are the conditions that will be used to evaluate the scorecard.
     * Each condition will have a comparator, value, and points that will be used to calculate the final score.
     * The points will be added to the overall score if the condition is met.
     * The overall score will be normalized to a 100 point scale to ensure uniformity across different scorecards.
     *
     * @var array<array<string, mixed>> $conditions
     */
    #[JsonProperty('conditions'), ArrayType([['string' => 'mixed']])]
    public array $conditions;

    /**
     * @param array{
     *   structuredOutputId: string,
     *   conditions: array<array<string, mixed>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->structuredOutputId = $values['structuredOutputId'];
        $this->conditions = $values['conditions'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
