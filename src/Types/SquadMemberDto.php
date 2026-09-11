<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use Vapi\Core\Types\Union;

/**
 * An assistant member of a squad. Reference a saved assistant or provide a transient assistant, then configure member-specific overrides and destinations for transfers.
 */
class SquadMemberDto extends JsonSerializableType
{
    /**
     * This is the assistant version (e.g. `v3`) to pin for this squad member. When set, the call uses
     * the snapshot from `assistant_version` (by `(assistantId, version)`) instead of the latest. Valid
     * only with `assistantId`; rejected with inline `assistant`. Omit to follow the latest version.
     *
     * @var ?string $assistantVersion
     */
    #[JsonProperty('assistantVersion')]
    public ?string $assistantVersion;

    /**
     * @var ?array<(
     *    TransferDestinationAssistant
     *   |HandoffDestinationAssistant
     * )> $assistantDestinations Assistants this squad member can route the conversation to through a transfer or handoff.
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
     *   assistantVersion?: ?string,
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
        $this->assistantVersion = $values['assistantVersion'] ?? null;
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
