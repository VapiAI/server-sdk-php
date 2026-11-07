<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class GoalEvaluationCurrentBatchResponseDto extends JsonSerializableType
{
    /**
     * @var array<GoalEvaluationCurrentCallResponseDto> $results One entry per requested call/goal pair, in request order, including entries without a current evaluation.
     */
    #[JsonProperty('results'), ArrayType([GoalEvaluationCurrentCallResponseDto::class])]
    public array $results;

    /**
     * @param array{
     *   results: array<GoalEvaluationCurrentCallResponseDto>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->results = $values['results'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
