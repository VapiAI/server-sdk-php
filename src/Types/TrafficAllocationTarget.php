<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TrafficAllocationTarget extends JsonSerializableType
{
    /**
     * @var string $assistantVersion The assistant version this target sends calls to, such as "v7".
     */
    #[JsonProperty('assistantVersion')]
    public string $assistantVersion;

    /**
     * @var float $position The target's place in the split, starting at 0. Set from the order of the targets array.
     */
    #[JsonProperty('position')]
    public float $position;

    /**
     * @var float $percentage Share of calls sent to this version, from 0 to 100 with up to three decimal places. Targets add up to exactly 100. A 0% target keeps the version in the split without sending it calls.
     */
    #[JsonProperty('percentage')]
    public float $percentage;

    /**
     * @param array{
     *   assistantVersion: string,
     *   position: float,
     *   percentage: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistantVersion = $values['assistantVersion'];
        $this->position = $values['position'];
        $this->percentage = $values['percentage'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
