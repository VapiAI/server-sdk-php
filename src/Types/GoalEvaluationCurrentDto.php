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
     * @var ?string $assistantVersionId The assistant version the call ran on. Absent when the call ran on no version.
     */
    #[JsonProperty('assistantVersionId')]
    public ?string $assistantVersionId;

    /**
     * @var ?string $assistantVersion That version's label, such as v3. Absent when the call ran on no version or the label was not available when the call was registered.
     */
    #[JsonProperty('assistantVersion')]
    public ?string $assistantVersion;

    /**
     * @param array{
     *   assistantId: string,
     *   goalId: string,
     *   goalVersion: string,
     *   callEndedAt: DateTime,
     *   processingState: value-of<GoalEvaluationCurrentDtoProcessingState>,
     *   goalOutcome?: ?value-of<GoalEvaluationCurrentDtoGoalOutcome>,
     *   assistantVersionId?: ?string,
     *   assistantVersion?: ?string,
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
        $this->assistantVersionId = $values['assistantVersionId'] ?? null;
        $this->assistantVersion = $values['assistantVersion'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
