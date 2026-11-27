<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CallHealthDashboardAssistantSummaryResponseDto extends JsonSerializableType
{
    /**
     * @var CallHealthDashboardAssistantReferenceDto $assistant Current permitted assistant metadata, fetched in a batch.
     */
    #[JsonProperty('assistant')]
    public CallHealthDashboardAssistantReferenceDto $assistant;

    /**
     * @var CallHealthDashboardGoalDefinitionDto $goalDefinition Every row represents an explicitly selected, tenant-owned assistant goal.
     */
    #[JsonProperty('goalDefinition')]
    public CallHealthDashboardGoalDefinitionDto $goalDefinition;

    /**
     * @var CallHealthDashboardGoalSummaryDto $goal Window totals for the selected goal, including zero-result assistants.
     */
    #[JsonProperty('goal')]
    public CallHealthDashboardGoalSummaryDto $goal;

    /**
     * @var array<CallHealthDashboardGoalDailyDto> $results One ascending contiguous page of dates in the requested time zone, including empty buckets.
     */
    #[JsonProperty('results'), ArrayType([CallHealthDashboardGoalDailyDto::class])]
    public array $results;

    /**
     * @var CallHealthDashboardSeriesPageDto $seriesPage
     */
    #[JsonProperty('seriesPage')]
    public CallHealthDashboardSeriesPageDto $seriesPage;

    /**
     * @var CallHealthDashboardCoverageDto $coverage Received-work processing coverage, separate from success rates.
     */
    #[JsonProperty('coverage')]
    public CallHealthDashboardCoverageDto $coverage;

    /**
     * @var array<CallHealthDashboardGoalVersionSummaryDto> $assistantVersions Full-window totals per assistant version the calls ran on, newest version first; they partition `goal`.
     */
    #[JsonProperty('assistantVersions'), ArrayType([CallHealthDashboardGoalVersionSummaryDto::class])]
    public array $assistantVersions;

    /**
     * @param array{
     *   assistant: CallHealthDashboardAssistantReferenceDto,
     *   goalDefinition: CallHealthDashboardGoalDefinitionDto,
     *   goal: CallHealthDashboardGoalSummaryDto,
     *   results: array<CallHealthDashboardGoalDailyDto>,
     *   seriesPage: CallHealthDashboardSeriesPageDto,
     *   coverage: CallHealthDashboardCoverageDto,
     *   assistantVersions: array<CallHealthDashboardGoalVersionSummaryDto>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistant = $values['assistant'];
        $this->goalDefinition = $values['goalDefinition'];
        $this->goal = $values['goal'];
        $this->results = $values['results'];
        $this->seriesPage = $values['seriesPage'];
        $this->coverage = $values['coverage'];
        $this->assistantVersions = $values['assistantVersions'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
