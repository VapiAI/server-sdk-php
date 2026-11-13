<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

class AssistantGoalDto extends JsonSerializableType
{
    /**
     * @var string $orgId
     */
    #[JsonProperty('orgId')]
    public string $orgId;

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
     * @var string $goalVersion Committed decimal bigint revision.
     */
    #[JsonProperty('goalVersion')]
    public string $goalVersion;

    /**
     * @var string $succeedsWhen
     */
    #[JsonProperty('succeedsWhen')]
    public string $succeedsWhen;

    /**
     * @var ?string $leaveOut
     */
    #[JsonProperty('leaveOut')]
    public ?string $leaveOut;

    /**
     * @var DateTime $createdAt Committed goal-change time anchoring its fixed backfill window.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @param array{
     *   orgId: string,
     *   assistantId: string,
     *   goalId: string,
     *   goalVersion: string,
     *   succeedsWhen: string,
     *   createdAt: DateTime,
     *   leaveOut?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->orgId = $values['orgId'];
        $this->assistantId = $values['assistantId'];
        $this->goalId = $values['goalId'];
        $this->goalVersion = $values['goalVersion'];
        $this->succeedsWhen = $values['succeedsWhen'];
        $this->leaveOut = $values['leaveOut'] ?? null;
        $this->createdAt = $values['createdAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
