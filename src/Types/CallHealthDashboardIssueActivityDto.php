<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

class CallHealthDashboardIssueActivityDto extends JsonSerializableType
{
    /**
     * @var int $rowVersion Existing issue version after this transition; also the per-issue activity identity.
     */
    #[JsonProperty('rowVersion')]
    public int $rowVersion;

    /**
     * @var value-of<CallHealthDashboardIssueActivityDtoAction> $action User resolve, dismiss or restore, or the system reopen written when a new match reopens a resolved issue.
     */
    #[JsonProperty('action')]
    public string $action;

    /**
     * @var ?string $actorUserId Omitted for private-key actors and system entries; names/emails are not copied.
     */
    #[JsonProperty('actorUserId')]
    public ?string $actorUserId;

    /**
     * @var ?string $comment Optional team-visible comment; omitted after privacy scrubbing.
     */
    #[JsonProperty('comment')]
    public ?string $comment;

    /**
     * @var DateTime $createdAt Database action time; ordering uses rowVersion rather than rounded timestamps.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @param array{
     *   rowVersion: int,
     *   action: value-of<CallHealthDashboardIssueActivityDtoAction>,
     *   createdAt: DateTime,
     *   actorUserId?: ?string,
     *   comment?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->rowVersion = $values['rowVersion'];
        $this->action = $values['action'];
        $this->actorUserId = $values['actorUserId'] ?? null;
        $this->comment = $values['comment'] ?? null;
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
