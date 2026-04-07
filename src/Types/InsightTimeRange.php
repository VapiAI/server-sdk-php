<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class InsightTimeRange extends JsonSerializableType
{
    /**
     * This is the start date for the time range.
     *
     * Should be a valid ISO 8601 date-time string or relative time string.
     * If not provided, defaults to the 7 days ago.
     *
     * Relative time strings of the format "-{number}{unit}" are allowed.
     *
     * Valid units are:
     * - d: days
     * - h: hours
     * - w: weeks
     * - m: months
     * - y: years
     *
     * @var ?array<string, mixed> $start
     */
    #[JsonProperty('start'), ArrayType(['string' => 'mixed'])]
    public ?array $start;

    /**
     * This is the end date for the time range.
     *
     * Should be a valid ISO 8601 date-time string or relative time string.
     * If not provided, defaults to now.
     *
     * Relative time strings of the format "-{number}{unit}" are allowed.
     *
     * Valid units are:
     * - d: days
     * - h: hours
     * - w: weeks
     * - m: months
     * - y: years
     *
     * @var ?array<string, mixed> $end
     */
    #[JsonProperty('end'), ArrayType(['string' => 'mixed'])]
    public ?array $end;

    /**
     * This is the timezone you want to set for the query.
     *
     * If not provided, defaults to UTC.
     *
     * @var ?string $timezone
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @param array{
     *   start?: ?array<string, mixed>,
     *   end?: ?array<string, mixed>,
     *   timezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->start = $values['start'] ?? null;
        $this->end = $values['end'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
