<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CreateTrafficAllocationTargetDto extends JsonSerializableType
{
    /**
     * @var string $assistantVersion A published version of this assistant, such as "v7". To split onto a new version, publish it first, then create the allocation.
     */
    #[JsonProperty('assistantVersion')]
    public string $assistantVersion;

    /**
     * @var float $percentage Share of calls sent to this version, from 0 to 100 with up to three decimal places. Finer values are rejected, not rounded. All targets together add up to exactly 100. Position is taken from array order.
     */
    #[JsonProperty('percentage')]
    public float $percentage;

    /**
     * @param array{
     *   assistantVersion: string,
     *   percentage: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistantVersion = $values['assistantVersion'];
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
