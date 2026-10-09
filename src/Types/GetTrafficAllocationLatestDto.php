<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class GetTrafficAllocationLatestDto extends JsonSerializableType
{
    /**
     * @var string $assistantId The assistant whose latest allocation to return.
     */
    #[JsonProperty('assistantId')]
    public string $assistantId;

    /**
     * @param array{
     *   assistantId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistantId = $values['assistantId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
