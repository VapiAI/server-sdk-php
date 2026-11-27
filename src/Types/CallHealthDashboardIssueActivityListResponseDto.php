<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CallHealthDashboardIssueActivityListResponseDto extends JsonSerializableType
{
    /**
     * @var array<CallHealthDashboardIssueActivityDto> $results Newest issue versions first; this is shared team activity, not per-user feedback.
     */
    #[JsonProperty('results'), ArrayType([CallHealthDashboardIssueActivityDto::class])]
    public array $results;

    /**
     * @var ?string $nextCursor Signed continuation bound to the authenticated organization, issue and activity contract.
     */
    #[JsonProperty('nextCursor')]
    public ?string $nextCursor;

    /**
     * @param array{
     *   results: array<CallHealthDashboardIssueActivityDto>,
     *   nextCursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->results = $values['results'];
        $this->nextCursor = $values['nextCursor'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
