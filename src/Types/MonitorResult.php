<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Result of evaluating an attached monitor's filter for a call.
 */
class MonitorResult extends JsonSerializableType
{
    /**
     * @var string $monitorId Unique identifier of the monitor that produced this result.
     */
    #[JsonProperty('monitorId')]
    public string $monitorId;

    /**
     * @var bool $filterPassed Whether the monitor's filter matched the call.
     */
    #[JsonProperty('filterPassed')]
    public bool $filterPassed;

    /**
     * @param array{
     *   monitorId: string,
     *   filterPassed: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->monitorId = $values['monitorId'];
        $this->filterPassed = $values['filterPassed'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
