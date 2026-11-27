<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;
use Vapi\Core\Types\ArrayType;

class CallHealthDashboardGoalCallDto extends JsonSerializableType
{
    /**
     * @var string $callId The call this row reports the goal result for.
     */
    #[JsonProperty('callId')]
    public string $callId;

    /**
     * @var DateTime $callTime Call completion time (endedAt), never startedAt.
     */
    #[JsonProperty('callTime'), Date(Date::TYPE_DATETIME)]
    public DateTime $callTime;

    /**
     * @var string $goalVersion Current goal revision the result belongs to; the list returns no other revision.
     */
    #[JsonProperty('goalVersion')]
    public string $goalVersion;

    /**
     * @var value-of<CallHealthDashboardGoalCallDtoProcessingState> $processingState Where this call's evaluation under goalVersion stands.
     */
    #[JsonProperty('processingState')]
    public string $processingState;

    /**
     * @var ?value-of<CallHealthDashboardGoalCallDtoGoalOutcome> $goalOutcome Absent until a result is accepted; a processing failure is never goal_not_met.
     */
    #[JsonProperty('goalOutcome')]
    public ?string $goalOutcome;

    /**
     * @var ?string $assistantVersionId The assistant version the call ran on; absent when it ran on none.
     */
    #[JsonProperty('assistantVersionId')]
    public ?string $assistantVersionId;

    /**
     * @var ?string $assistantVersion That version's label, such as v3; absent when the call ran on none or the label was unavailable at registration.
     */
    #[JsonProperty('assistantVersion')]
    public ?string $assistantVersion;

    /**
     * @var ?string $primaryCategoryKey The call's main failure category, the same as GET /call-health/call/{id} returns; absent when the call has no current classification or it selected none.
     */
    #[JsonProperty('primaryCategoryKey')]
    public ?string $primaryCategoryKey;

    /**
     * @var array<CallHealthDashboardGoalCallIssueDto> $issues Visible issues the call joined, in ascending ID order, the same as GET /call-health/call/{id} returns; empty when it joined none.
     */
    #[JsonProperty('issues'), ArrayType([CallHealthDashboardGoalCallIssueDto::class])]
    public array $issues;

    /**
     * @param array{
     *   callId: string,
     *   callTime: DateTime,
     *   goalVersion: string,
     *   processingState: value-of<CallHealthDashboardGoalCallDtoProcessingState>,
     *   issues: array<CallHealthDashboardGoalCallIssueDto>,
     *   goalOutcome?: ?value-of<CallHealthDashboardGoalCallDtoGoalOutcome>,
     *   assistantVersionId?: ?string,
     *   assistantVersion?: ?string,
     *   primaryCategoryKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->callId = $values['callId'];
        $this->callTime = $values['callTime'];
        $this->goalVersion = $values['goalVersion'];
        $this->processingState = $values['processingState'];
        $this->goalOutcome = $values['goalOutcome'] ?? null;
        $this->assistantVersionId = $values['assistantVersionId'] ?? null;
        $this->assistantVersion = $values['assistantVersion'] ?? null;
        $this->primaryCategoryKey = $values['primaryCategoryKey'] ?? null;
        $this->issues = $values['issues'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
