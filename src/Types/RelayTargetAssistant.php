<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class RelayTargetAssistant extends JsonSerializableType
{
    /**
     * @var ?string $assistantId The unique identifier of the assistant
     */
    #[JsonProperty('assistantId')]
    public ?string $assistantId;

    /**
     * @var ?string $assistantName The name of the assistant
     */
    #[JsonProperty('assistantName')]
    public ?string $assistantName;

    /**
     * @param array{
     *   assistantId?: ?string,
     *   assistantName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->assistantId = $values['assistantId'] ?? null;
        $this->assistantName = $values['assistantName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
