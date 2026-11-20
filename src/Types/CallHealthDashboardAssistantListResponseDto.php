<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CallHealthDashboardAssistantListResponseDto extends JsonSerializableType
{
    /**
     * @var array<CallHealthDashboardAssistantOverviewDto> $results Visible nondeleted assistants in ascending ID transport order; sort the exhausted result in the frontend.
     */
    #[JsonProperty('results'), ArrayType([CallHealthDashboardAssistantOverviewDto::class])]
    public array $results;

    /**
     * @var ?string $nextCursor Opaque ID continuation bound to tenant, completion window and filters.
     */
    #[JsonProperty('nextCursor')]
    public ?string $nextCursor;

    /**
     * @var CallHealthDashboardCoverageDto $coverage Received-work processing coverage, separate from analyzed goal results.
     */
    #[JsonProperty('coverage')]
    public CallHealthDashboardCoverageDto $coverage;

    /**
     * @param array{
     *   results: array<CallHealthDashboardAssistantOverviewDto>,
     *   coverage: CallHealthDashboardCoverageDto,
     *   nextCursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->results = $values['results'];
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
