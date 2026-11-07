<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TrafficTabEndedReasonCountDto extends JsonSerializableType
{
    /**
     * @var string $reason
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @var float $count
     */
    #[JsonProperty('count')]
    public float $count;

    /**
     * @param array{
     *   reason: string,
     *   count: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->reason = $values['reason'];
        $this->count = $values['count'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
