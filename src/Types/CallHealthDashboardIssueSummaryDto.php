<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use DateTime;
use Vapi\Core\Types\Date;

class CallHealthDashboardIssueSummaryDto extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<CallHealthDashboardIssueSummaryDtoStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var int $rowVersion
     */
    #[JsonProperty('rowVersion')]
    public int $rowVersion;

    /**
     * @var string $goalId Owning goal identity; issue-ID routes derive this selection from the issue.
     */
    #[JsonProperty('goalId')]
    public string $goalId;

    /**
     * @var string $categoryKey The ranking category the issue belongs to, such as `step_skipped`.
     */
    #[JsonProperty('categoryKey')]
    public string $categoryKey;

    /**
     * @var string $summary
     */
    #[JsonProperty('summary')]
    public string $summary;

    /**
     * @var CallHealthDashboardAssistantReferenceDto $assistant
     */
    #[JsonProperty('assistant')]
    public CallHealthDashboardAssistantReferenceDto $assistant;

    /**
     * @var int $affectedCallCount
     */
    #[JsonProperty('affectedCallCount')]
    public int $affectedCallCount;

    /**
     * @var int $analyzedCallCount Same assistant/current-goal/window denominator used by the goal reads.
     */
    #[JsonProperty('analyzedCallCount')]
    public int $analyzedCallCount;

    /**
     * @var ?float $affectedCallRate Distinct calls matching this issue / analyzedCallCount; absent at zero.
     */
    #[JsonProperty('affectedCallRate')]
    public ?float $affectedCallRate;

    /**
     * @var array<CallHealthDashboardIssueDailyDto> $dailySeries One ascending contiguous page of daily buckets in the requested time zone; memberships across issues are not unique calls.
     */
    #[JsonProperty('dailySeries'), ArrayType([CallHealthDashboardIssueDailyDto::class])]
    public array $dailySeries;

    /**
     * @var array<CallHealthDashboardIssueVersionDto> $assistantVersions Full-window counts per assistant version the calls ran on, newest version first; they partition the totals.
     */
    #[JsonProperty('assistantVersions'), ArrayType([CallHealthDashboardIssueVersionDto::class])]
    public array $assistantVersions;

    /**
     * @var ?DateTime $lastSeenAt
     */
    #[JsonProperty('lastSeenAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSeenAt;

    /**
     * @var CallHealthDashboardIssueCoverageDto $coverage
     */
    #[JsonProperty('coverage')]
    public CallHealthDashboardIssueCoverageDto $coverage;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   status: value-of<CallHealthDashboardIssueSummaryDtoStatus>,
     *   rowVersion: int,
     *   goalId: string,
     *   categoryKey: string,
     *   summary: string,
     *   assistant: CallHealthDashboardAssistantReferenceDto,
     *   affectedCallCount: int,
     *   analyzedCallCount: int,
     *   dailySeries: array<CallHealthDashboardIssueDailyDto>,
     *   assistantVersions: array<CallHealthDashboardIssueVersionDto>,
     *   coverage: CallHealthDashboardIssueCoverageDto,
     *   affectedCallRate?: ?float,
     *   lastSeenAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->status = $values['status'];
        $this->rowVersion = $values['rowVersion'];
        $this->goalId = $values['goalId'];
        $this->categoryKey = $values['categoryKey'];
        $this->summary = $values['summary'];
        $this->assistant = $values['assistant'];
        $this->affectedCallCount = $values['affectedCallCount'];
        $this->analyzedCallCount = $values['analyzedCallCount'];
        $this->affectedCallRate = $values['affectedCallRate'] ?? null;
        $this->dailySeries = $values['dailySeries'];
        $this->assistantVersions = $values['assistantVersions'];
        $this->lastSeenAt = $values['lastSeenAt'] ?? null;
        $this->coverage = $values['coverage'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
