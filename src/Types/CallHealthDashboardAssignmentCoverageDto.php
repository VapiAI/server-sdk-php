<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardAssignmentCoverageDto extends JsonSerializableType
{
    /**
     * @var int $pending
     */
    #[JsonProperty('pending')]
    public int $pending;

    /**
     * @var int $unmatched
     */
    #[JsonProperty('unmatched')]
    public int $unmatched;

    /**
     * @var int $skipped
     */
    #[JsonProperty('skipped')]
    public int $skipped;

    /**
     * @var int $unavailable
     */
    #[JsonProperty('unavailable')]
    public int $unavailable;

    /**
     * @var int $error
     */
    #[JsonProperty('error')]
    public int $error;

    /**
     * @var int $coverageGapCount
     */
    #[JsonProperty('coverageGapCount')]
    public int $coverageGapCount;

    /**
     * @param array{
     *   pending: int,
     *   unmatched: int,
     *   skipped: int,
     *   unavailable: int,
     *   error: int,
     *   coverageGapCount: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->pending = $values['pending'];
        $this->unmatched = $values['unmatched'];
        $this->skipped = $values['skipped'];
        $this->unavailable = $values['unavailable'];
        $this->error = $values['error'];
        $this->coverageGapCount = $values['coverageGapCount'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
