<?php

namespace Vapi\TrafficAllocations\Requests;

use Vapi\Core\Json\JsonSerializableType;
use DateTime;
use Vapi\TrafficAllocations\Types\TrafficAllocationControllerMetricsGetRequestBucket;

class TrafficAllocationControllerMetricsGetRequest extends JsonSerializableType
{
    /**
     * @var string $assistantId The assistant whose per-version traffic metrics to return.
     */
    public string $assistantId;

    /**
     * @var DateTime $from Start of the metrics window (inclusive), ISO 8601 datetime.
     */
    public DateTime $from;

    /**
     * @var DateTime $to End of the metrics window (exclusive), ISO 8601 datetime. Must be later than from, and the window may hold at most 2000 buckets of the requested width.
     */
    public DateTime $to;

    /**
     * @var ?value-of<TrafficAllocationControllerMetricsGetRequestBucket> $bucket Bucket size for the timeseries. Defaults to 'day'.
     */
    public ?string $bucket;

    /**
     * @var ?array<string> $structuredOutputIds Structured output ids to aggregate per version, as an array or a comma-separated string. At most 5.
     */
    public ?array $structuredOutputIds;

    /**
     * @param array{
     *   assistantId: string,
     *   from: DateTime,
     *   to: DateTime,
     *   bucket?: ?value-of<TrafficAllocationControllerMetricsGetRequestBucket>,
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
}
