<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TrafficAllocationLatestResponseDto extends JsonSerializableType
{
    /**
     * @var ?TrafficAllocation $allocation The source's current configuration: the newest allocation row with its targets. Absent when the source has never been configured.
     */
    #[JsonProperty('allocation')]
    public ?TrafficAllocation $allocation;

    /**
     * @param array{
     *   allocation?: ?TrafficAllocation,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->allocation = $values['allocation'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
