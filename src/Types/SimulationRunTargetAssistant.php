<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationRunTargetAssistant extends JsonSerializableType
{
    /**
     * @var ?string $assistantId ID of an existing assistant to test against. Cannot be combined with inline assistant.
     */
    #[JsonProperty('assistantId')]
    public ?string $assistantId;

    /**
     * @var ?TransientAssistantDto $assistant Inline assistant configuration to test against. Cannot be combined with assistantId.
     */
    #[JsonProperty('assistant')]
    public ?TransientAssistantDto $assistant;

    /**
     * @param array{
     *   assistantId?: ?string,
     *   assistant?: ?TransientAssistantDto,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->assistantId = $values['assistantId'] ?? null;
        $this->assistant = $values['assistant'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
