<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class GoalEvaluationCurrentBatchRequestDto extends JsonSerializableType
{
    /**
     * @var array<GoalEvaluationCurrentCallRequestDto> $evaluations Explicit call/goal pairs. The organization comes from the authenticated caller.
     */
    #[JsonProperty('evaluations'), ArrayType([GoalEvaluationCurrentCallRequestDto::class])]
    public array $evaluations;

    /**
     * @param array{
     *   evaluations: array<GoalEvaluationCurrentCallRequestDto>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->evaluations = $values['evaluations'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
