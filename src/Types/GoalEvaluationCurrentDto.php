<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

class GoalEvaluationCurrentDto extends JsonSerializableType
{
    /**
     * @var string $assistantId
     */
    #[JsonProperty('assistantId')]
    public string $assistantId;

    /**
     * @var string $goalId
     */
    #[JsonProperty('goalId')]
    public string $goalId;

    /**
     * @var string $goalVersion Current immutable goal revision, encoded as a decimal bigint string.
     */
    #[JsonProperty('goalVersion')]
    public string $goalVersion;

    /**
     * @var DateTime $callEndedAt
     */
    #[JsonProperty('callEndedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $callEndedAt;

    /**
     * @var value-of<GoalEvaluationCurrentDtoProcessingState> $processingState
     */
    #[JsonProperty('processingState')]
    public string $processingState;

    /**
     * @var ?value-of<GoalEvaluationCurrentDtoGoalOutcome> $goalOutcome Absent until a semantic result is accepted. Processing failures are never goal_not_met.
     */
    #[JsonProperty('goalOutcome')]
    public ?string $goalOutcome;

    /**
     * @param array{
     *   assistantId: string,
     *   goalId: string,
     *   goalVersion: string,
     *   callEndedAt: DateTime,
     *   processingState: value-of<GoalEvaluationCurrentDtoProcessingState>,
     *   goalOutcome?: ?value-of<GoalEvaluationCurrentDtoGoalOutcome>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistantId = $values['assistantId'];
        $this->goalId = $values['goalId'];
        $this->goalVersion = $values['goalVersion'];
        $this->callEndedAt = $values['callEndedAt'];
        $this->processingState = $values['processingState'];
        $this->goalOutcome = $values['goalOutcome'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
