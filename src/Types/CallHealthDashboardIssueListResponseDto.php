<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CallHealthDashboardIssueListResponseDto extends JsonSerializableType
{
    /**
     * @var array<CallHealthDashboardIssueSummaryDto> $results
     */
    #[JsonProperty('results'), ArrayType([CallHealthDashboardIssueSummaryDto::class])]
    public array $results;

    /**
     * @var CallHealthDashboardSeriesPageDto $seriesPage Every row's dailySeries represents this same date page.
     */
    #[JsonProperty('seriesPage')]
    public CallHealthDashboardSeriesPageDto $seriesPage;

    /**
     * @var CallHealthDashboardFacetsDto $facets
     */
    #[JsonProperty('facets')]
    public CallHealthDashboardFacetsDto $facets;

    /**
     * @var ?string $nextCursor
     */
    #[JsonProperty('nextCursor')]
    public ?string $nextCursor;

    /**
     * @var CallHealthDashboardCoverageDto $coverage
     */
    #[JsonProperty('coverage')]
    public CallHealthDashboardCoverageDto $coverage;

    /**
     * @param array{
     *   results: array<CallHealthDashboardIssueSummaryDto>,
     *   seriesPage: CallHealthDashboardSeriesPageDto,
     *   facets: CallHealthDashboardFacetsDto,
     *   coverage: CallHealthDashboardCoverageDto,
     *   nextCursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->results = $values['results'];
        $this->seriesPage = $values['seriesPage'];
        $this->facets = $values['facets'];
        $this->nextCursor = $values['nextCursor'] ?? null;
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
