<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardGoalGapsDto extends JsonSerializableType
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
     * @param array{
     *   pending: int,
     *   unavailable: int,
     *   skipped: int,
     *   error: int,
     *   excluded: int,
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
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
