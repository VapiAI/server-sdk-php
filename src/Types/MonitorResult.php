<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class MonitorResult extends JsonSerializableType
{
    /**
     * @var string $monitorId
     */
    #[JsonProperty('monitorId')]
    public string $monitorId;

    /**
     * @var bool $filterPassed
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
