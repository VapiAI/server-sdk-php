<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardClassificationCoverageDto extends JsonSerializableType
{
    /**
     * @var int $pending
     */
    #[JsonProperty('pending')]
    public int $pending;

    /**
     * @var int $unavailable
     */
    #[JsonProperty('unavailable')]
    public int $unavailable;

    /**
     * @var int $skipped
     */
    #[JsonProperty('skipped')]
    public int $skipped;

    /**
     * @var int $error
     */
    #[JsonProperty('error')]
    public int $error;

    /**
     * @var int $excluded
     */
    #[JsonProperty('excluded')]
    public int $excluded;

    /**
     * @var int $complete
     */
    #[JsonProperty('complete')]
    public int $complete;

    /**
     * @var int $partial
     */
    #[JsonProperty('partial')]
    public int $partial;

    /**
     * @param array{
     *   pending: int,
     *   unavailable: int,
     *   skipped: int,
     *   error: int,
     *   excluded: int,
     *   complete: int,
     *   partial: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->pending = $values['pending'];
        $this->unavailable = $values['unavailable'];
        $this->skipped = $values['skipped'];
        $this->error = $values['error'];
        $this->excluded = $values['excluded'];
        $this->complete = $values['complete'];
        $this->partial = $values['partial'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
