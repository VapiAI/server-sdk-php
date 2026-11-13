<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;
use Vapi\Core\Types\ArrayType;

class GetTrafficTabMetricsDto extends JsonSerializableType
{
    /**
     * @var string $assistantId The assistant whose per-version traffic metrics to return.
     */
    #[JsonProperty('assistantId')]
    public string $assistantId;

    /**
     * @var DateTime $from Start of the metrics window (inclusive), ISO 8601 datetime.
     */
    #[JsonProperty('from'), Date(Date::TYPE_DATETIME)]
    public DateTime $from;

    /**
     * @var DateTime $to End of the metrics window (exclusive), ISO 8601 datetime. Must be later than from, and the window may hold at most 2000 buckets of the requested width.
     */
    #[JsonProperty('to'), Date(Date::TYPE_DATETIME)]
    public DateTime $to;

    /**
     * @var ?value-of<GetTrafficTabMetricsDtoBucket> $bucket Bucket size for the timeseries. Defaults to 'day'.
     */
    #[JsonProperty('bucket')]
    public ?string $bucket;

    /**
     * @var ?array<string> $structuredOutputIds Structured output ids to aggregate per version, as an array or a comma-separated string. At most 5.
     */
    #[JsonProperty('structuredOutputIds'), ArrayType(['string'])]
    public ?array $structuredOutputIds;

    /**
     * @param array{
     *   assistantId: string,
     *   from: DateTime,
     *   to: DateTime,
     *   bucket?: ?value-of<GetTrafficTabMetricsDtoBucket>,
     *   structuredOutputIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistantId = $values['assistantId'];
        $this->from = $values['from'];
        $this->to = $values['to'];
        $this->bucket = $values['bucket'] ?? null;
        $this->structuredOutputIds = $values['structuredOutputIds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
