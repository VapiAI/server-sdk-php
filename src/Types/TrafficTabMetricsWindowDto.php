<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TrafficTabMetricsWindowDto extends JsonSerializableType
{
    /**
     * @var string $from Start of the window (inclusive), ISO 8601.
     */
    #[JsonProperty('from')]
    public string $from;

    /**
     * @var string $to End of the window (exclusive), ISO 8601.
     */
    #[JsonProperty('to')]
    public string $to;

    /**
     * @var value-of<TrafficTabMetricsWindowDtoBucket> $bucket
     */
    #[JsonProperty('bucket')]
    public string $bucket;

    /**
     * @param array{
     *   from: string,
     *   to: string,
     *   bucket: value-of<TrafficTabMetricsWindowDtoBucket>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->from = $values['from'];
        $this->to = $values['to'];
        $this->bucket = $values['bucket'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
