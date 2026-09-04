<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Identifies an assistant that became active during a call.
 */
class AssistantActivation extends JsonSerializableType
{
    /**
     * This is the version label (e.g. `v3`) of the assistant active when
     * the activation row was recorded. `null` for inline assistants,
     * orgs not on assistant versioning, and parent assistants that have
     * not yet been published under it.
     *
     * @var ?string $assistantVersion
     */
    #[JsonProperty('assistantVersion')]
    public ?string $assistantVersion;

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
     *   assistantVersion?: ?string,
     *   assistantId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistantVersion = $values['assistantVersion'] ?? null;
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
