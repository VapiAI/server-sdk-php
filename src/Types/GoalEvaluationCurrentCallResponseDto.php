<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class GoalEvaluationCurrentCallResponseDto extends JsonSerializableType
{
    /**
     * @var string $callId
     */
    #[JsonProperty('callId')]
    public string $callId;

    /**
     * @var string $goalId
     */
    #[JsonProperty('goalId')]
    public string $goalId;

    /**
     * @var ?string $currentGoalVersion Current revision of the requested goal for a visible call. Absent when that goal does not belong to the source assistant or the source is hidden. An absent evaluation does not imply queued or pending work.
     */
    #[JsonProperty('currentGoalVersion')]
    public ?string $currentGoalVersion;

    /**
     * @var ?GoalEvaluationCurrentDto $currentEvaluation
     */
    #[JsonProperty('currentEvaluation')]
    public ?GoalEvaluationCurrentDto $currentEvaluation;

    /**
     * @param array{
     *   callId: string,
     *   goalId: string,
     *   currentGoalVersion?: ?string,
     *   currentEvaluation?: ?GoalEvaluationCurrentDto,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->callId = $values['callId'];
        $this->goalId = $values['goalId'];
        $this->currentGoalVersion = $values['currentGoalVersion'] ?? null;
        $this->currentEvaluation = $values['currentEvaluation'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
