<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AssistantActivation extends JsonSerializableType
{
    /**
     * @var string $assistantName This is the name of the assistant that was active during the call.
     */
    #[JsonProperty('assistantName')]
    public string $assistantName;

    /**
     * @var ?string $assistantId This is the ID of the assistant that was active during the call.
     */
    #[JsonProperty('assistantId')]
    public ?string $assistantId;

    /**
     * @param array{
     *   assistantName: string,
     *   assistantId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistantName = $values['assistantName'];
        $this->assistantId = $values['assistantId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
