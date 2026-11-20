<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardTriageRequestDto extends JsonSerializableType
{
    /**
     * @var value-of<CallHealthDashboardTriageRequestDtoAction> $action
     */
    #[JsonProperty('action')]
    public string $action;

    /**
     * @var int $expectedRowVersion
     */
    #[JsonProperty('expectedRowVersion')]
    public int $expectedRowVersion;

    /**
     * @var ?string $comment Trimmed; at most 2,048 UTF-16 code units. Empty comments are omitted from activity.
     */
    #[JsonProperty('comment')]
    public ?string $comment;

    /**
     * @param array{
     *   action: value-of<CallHealthDashboardTriageRequestDtoAction>,
     *   expectedRowVersion: int,
     *   comment?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->action = $values['action'];
        $this->expectedRowVersion = $values['expectedRowVersion'];
        $this->comment = $values['comment'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
