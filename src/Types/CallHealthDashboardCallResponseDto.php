<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CallHealthDashboardCallResponseDto extends JsonSerializableType
{
    /**
     * @var string $callId
     */
    #[JsonProperty('callId')]
    public string $callId;

    /**
     * @var string $assistantId
     */
    #[JsonProperty('assistantId')]
    public string $assistantId;

    /**
     * @var string $goalId Selected goal identity.
     */
    #[JsonProperty('goalId')]
    public string $goalId;

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
     * @var value-of<CallHealthDashboardCallResponseDtoAssessmentState> $assessmentState Classification state, named as in the coverage `classification` counters.
     */
    #[JsonProperty('assessmentState')]
    public string $assessmentState;

    /**
     * @var ?string $primaryCategoryKey The call's main failure category; absent when classification selected none.
     */
    #[JsonProperty('primaryCategoryKey')]
    public ?string $primaryCategoryKey;

    /**
     * @var array<string> $otherCategoryKeys The other selected categories, in ascending key order.
     */
    #[JsonProperty('otherCategoryKeys'), ArrayType(['string'])]
    public array $otherCategoryKeys;

    /**
     * @var array<CallHealthDashboardCallIssueDto> $issues Visible issues the call joined, in ascending ID order.
     */
    #[JsonProperty('issues'), ArrayType([CallHealthDashboardCallIssueDto::class])]
    public array $issues;

    /**
     * @param array{
     *   callId: string,
     *   assistantId: string,
     *   goalId: string,
     *   assessmentState: value-of<CallHealthDashboardCallResponseDtoAssessmentState>,
     *   otherCategoryKeys: array<string>,
     *   issues: array<CallHealthDashboardCallIssueDto>,
     *   assistantVersionId?: ?string,
     *   assistantVersion?: ?string,
     *   primaryCategoryKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->callId = $values['callId'];
        $this->assistantId = $values['assistantId'];
        $this->goalId = $values['goalId'];
        $this->assistantVersionId = $values['assistantVersionId'] ?? null;
        $this->assistantVersion = $values['assistantVersion'] ?? null;
        $this->assessmentState = $values['assessmentState'];
        $this->primaryCategoryKey = $values['primaryCategoryKey'] ?? null;
        $this->otherCategoryKeys = $values['otherCategoryKeys'];
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
