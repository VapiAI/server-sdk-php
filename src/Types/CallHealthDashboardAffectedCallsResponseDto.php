<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CallHealthDashboardAffectedCallsResponseDto extends JsonSerializableType
{
    /**
     * @var array<CallHealthDashboardAffectedCallDto> $results
     */
    #[JsonProperty('results'), ArrayType([CallHealthDashboardAffectedCallDto::class])]
    public array $results;

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
     *   results: array<CallHealthDashboardAffectedCallDto>,
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
