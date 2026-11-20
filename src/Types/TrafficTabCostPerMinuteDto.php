<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TrafficTabCostPerMinuteDto extends JsonSerializableType
{
    /**
     * @var ?float $mean
     */
    #[JsonProperty('mean')]
    public ?float $mean;

    /**
     * @var TrafficTabCostBreakdownPerMinuteDto $breakdown
     */
    #[JsonProperty('breakdown')]
    public TrafficTabCostBreakdownPerMinuteDto $breakdown;

    /**
     * @param array{
     *   breakdown: TrafficTabCostBreakdownPerMinuteDto,
     *   mean?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->mean = $values['mean'] ?? null;
        $this->breakdown = $values['breakdown'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
