<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use DateTime;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Date;

class CallHealthDashboardIssueDailyDto extends JsonSerializableType
{
    /**
     * @var DateTime $date UTC calendar date, with boundary buckets clipped to the requested window.
     */
    #[JsonProperty('date'), Date(Date::TYPE_DATE)]
    public DateTime $date;

    /**
     * @var int $affectedCallCount Distinct visible calls matching this issue in the bucket.
     */
    #[JsonProperty('affectedCallCount')]
    public int $affectedCallCount;

    /**
     * @var int $analyzedCallCount All accepted current-goal outcomes for the issue's assistant in the bucket.
     */
    #[JsonProperty('analyzedCallCount')]
    public int $analyzedCallCount;

    /**
     * @var ?float $affectedCallRate affectedCallCount / analyzedCallCount; omitted for a zero denominator.
     */
    #[JsonProperty('affectedCallRate')]
    public ?float $affectedCallRate;

    /**
     * @param array{
     *   date: DateTime,
     *   affectedCallCount: int,
     *   analyzedCallCount: int,
     *   affectedCallRate?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->date = $values['date'];
        $this->affectedCallCount = $values['affectedCallCount'];
        $this->analyzedCallCount = $values['analyzedCallCount'];
        $this->affectedCallRate = $values['affectedCallRate'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
