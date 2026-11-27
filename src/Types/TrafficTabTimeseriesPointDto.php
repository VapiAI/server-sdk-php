<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TrafficTabTimeseriesPointDto extends JsonSerializableType
{
    /**
     * @var string $bucketStart Start of the bucket, ISO 8601 (UTC).
     */
    #[JsonProperty('bucketStart')]
    public string $bucketStart;

    /**
     * @var float $calls
     */
    #[JsonProperty('calls')]
    public float $calls;

    /**
     * @var ?float $durationSecondsMean
     */
    #[JsonProperty('durationSecondsMean')]
    public ?float $durationSecondsMean;

    /**
     * @var ?float $costPerMinuteMean
     */
    #[JsonProperty('costPerMinuteMean')]
    public ?float $costPerMinuteMean;

    /**
     * @var ?float $turnLatencyMsMean
     */
    #[JsonProperty('turnLatencyMsMean')]
    public ?float $turnLatencyMsMean;

    /**
     * @param array{
     *   bucketStart: string,
     *   calls: float,
     *   durationSecondsMean?: ?float,
     *   costPerMinuteMean?: ?float,
     *   turnLatencyMsMean?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->bucketStart = $values['bucketStart'];
        $this->calls = $values['calls'];
        $this->durationSecondsMean = $values['durationSecondsMean'] ?? null;
        $this->costPerMinuteMean = $values['costPerMinuteMean'] ?? null;
        $this->turnLatencyMsMean = $values['turnLatencyMsMean'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
