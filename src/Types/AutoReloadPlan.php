<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AutoReloadPlan extends JsonSerializableType
{
    /**
     * @var float $credits This the amount of credits to reload.
     */
    #[JsonProperty('credits')]
    public float $credits;

    /**
     * @var float $threshold This is the limit at which the reload is triggered.
     */
    #[JsonProperty('threshold')]
    public float $threshold;

    /**
     * @param array{
     *   credits: float,
     *   threshold: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->credits = $values['credits'];
        $this->threshold = $values['threshold'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
