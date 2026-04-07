<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class GenerateScenariosDto extends JsonSerializableType
{
    /**
     * @var ?string $assistantId ID of the assistant to generate scenarios for
     */
    #[JsonProperty('assistantId')]
    public ?string $assistantId;

    /**
     * @var ?string $squadId ID of the squad to generate scenarios for
     */
    #[JsonProperty('squadId')]
    public ?string $squadId;

    /**
     * @param array{
     *   assistantId?: ?string,
     *   squadId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->assistantId = $values['assistantId'] ?? null;
        $this->squadId = $values['squadId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
