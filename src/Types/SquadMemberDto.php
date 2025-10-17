<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use Vapi\Core\Types\Union;

class SquadMemberDto extends JsonSerializableType
{
    /**
     * @var ?array<(
     *    TransferDestinationAssistant
     *   |HandoffDestinationAssistant
     * )> $assistantDestinations
     */
    #[JsonProperty('assistantDestinations'), ArrayType([new Union(TransferDestinationAssistant::class, HandoffDestinationAssistant::class)])]
    public ?array $assistantDestinations;

    /**
     * @var ?string $assistantId This is the assistant that will be used for the call. To use a transient assistant, use `assistant` instead.
     */
    #[JsonProperty('assistantId')]
    public ?string $assistantId;

    /**
     * @var ?CreateAssistantDto $assistant This is the assistant that will be used for the call. To use an existing assistant, use `assistantId` instead.
     */
    #[JsonProperty('assistant')]
    public ?CreateAssistantDto $assistant;

    /**
     * @var ?AssistantOverrides $assistantOverrides This can be used to override the assistant's settings and provide values for it's template variables.
     */
    #[JsonProperty('assistantOverrides')]
    public ?AssistantOverrides $assistantOverrides;

    /**
     * @param array{
     *   assistantDestinations?: ?array<(
     *    TransferDestinationAssistant
     *   |HandoffDestinationAssistant
     * )>,
     *   assistantId?: ?string,
     *   assistant?: ?CreateAssistantDto,
     *   assistantOverrides?: ?AssistantOverrides,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->assistantDestinations = $values['assistantDestinations'] ?? null;
        $this->assistantId = $values['assistantId'] ?? null;
        $this->assistant = $values['assistant'] ?? null;
        $this->assistantOverrides = $values['assistantOverrides'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
