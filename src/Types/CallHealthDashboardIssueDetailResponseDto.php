<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardIssueDetailResponseDto extends JsonSerializableType
{
    /**
     * @var CallHealthDashboardIssueSummaryDto $issue
     */
    #[JsonProperty('issue')]
    public CallHealthDashboardIssueSummaryDto $issue;

    /**
     * @var CallHealthDashboardSeriesPageDto $seriesPage
     */
    #[JsonProperty('seriesPage')]
    public CallHealthDashboardSeriesPageDto $seriesPage;

    /**
     * @var CallHealthDashboardIssueDefinitionDto $definition
     */
    #[JsonProperty('definition')]
    public CallHealthDashboardIssueDefinitionDto $definition;

    /**
     * @var CallHealthDashboardCoverageDto $coverage
     */
    #[JsonProperty('coverage')]
    public CallHealthDashboardCoverageDto $coverage;

    /**
     * @param array{
     *   issue: CallHealthDashboardIssueSummaryDto,
     *   seriesPage: CallHealthDashboardSeriesPageDto,
     *   definition: CallHealthDashboardIssueDefinitionDto,
     *   coverage: CallHealthDashboardCoverageDto,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->issue = $values['issue'];
        $this->seriesPage = $values['seriesPage'];
        $this->definition = $values['definition'];
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
