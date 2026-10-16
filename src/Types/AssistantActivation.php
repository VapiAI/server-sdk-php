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
     * the activation row was recorded. Absent for inline assistants,
     * orgs not on assistant versioning, and parent assistants that have
     * not yet been published under it.
     *
     * @var ?string $assistantVersion
     */
    #[JsonProperty('assistantVersion')]
    public ?string $assistantVersion;

    /**
     * This is the version label (e.g. `v3`) of the squad that was governing the
     * call when this activation was recorded. Absent for activations that no
     * squad version governs: standalone-assistant calls, flag-off orgs, squads
     * with no published version, and hops to an assistant outside the squad.
     *
     * @var ?string $squadVersion
     */
    #[JsonProperty('squadVersion')]
    public ?string $squadVersion;

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
     *   squadVersion?: ?string,
     *   assistantId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistantVersion = $values['assistantVersion'] ?? null;
        $this->squadVersion = $values['squadVersion'] ?? null;
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
