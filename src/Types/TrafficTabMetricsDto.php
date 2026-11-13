<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class TrafficTabMetricsDto extends JsonSerializableType
{
    /**
     * @var TrafficTabMetricsWindowDto $window
     */
    #[JsonProperty('window')]
    public TrafficTabMetricsWindowDto $window;

    /**
     * @var float $totalCalls All calls for the assistant in the window, every version.
     */
    #[JsonProperty('totalCalls')]
    public float $totalCalls;

    /**
     * @var ?TrafficAllocation $currentAllocation The allocation currently governing the assistant. Null when traffic splitting was never configured.
     */
    #[JsonProperty('currentAllocation')]
    public ?TrafficAllocation $currentAllocation;

    /**
     * @var array<TrafficTabVersionMetricsDto> $versions One row per version with calls in the window, plus the unversioned row when it has any. Ordered by calls descending, then by version label (numeric-aware), the unversioned row last among equals.
     */
    #[JsonProperty('versions'), ArrayType([TrafficTabVersionMetricsDto::class])]
    public array $versions;

    /**
     * @param array{
     *   window: TrafficTabMetricsWindowDto,
     *   totalCalls: float,
     *   versions: array<TrafficTabVersionMetricsDto>,
     *   currentAllocation?: ?TrafficAllocation,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->window = $values['window'];
        $this->totalCalls = $values['totalCalls'];
        $this->currentAllocation = $values['currentAllocation'] ?? null;
        $this->versions = $values['versions'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
