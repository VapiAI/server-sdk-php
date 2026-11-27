<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CallHealthDashboardGoalCallsResponseDto extends JsonSerializableType
{
    /**
     * @var array<CallHealthDashboardGoalCallDto> $results Newest completion first, then call UUID descending.
     */
    #[JsonProperty('results'), ArrayType([CallHealthDashboardGoalCallDto::class])]
    public array $results;

    /**
     * @var ?string $nextCursor Continues the list after the last result; absent on the last page.
     */
    #[JsonProperty('nextCursor')]
    public ?string $nextCursor;

    /**
     * @param array{
     *   results: array<CallHealthDashboardGoalCallDto>,
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
