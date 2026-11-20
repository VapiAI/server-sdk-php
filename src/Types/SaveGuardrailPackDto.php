<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SaveGuardrailPackDto extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<string> $ruleIds Projected from membership rows; a supplied array replaces membership.
     */
    #[JsonProperty('ruleIds'), ArrayType(['string'])]
    public ?array $ruleIds;

    /**
     * @var GuardrailPackSnapshot $expected The complete last-read snapshot prevents silently replacing another editor’s changes.
     */
    #[JsonProperty('expected')]
    public GuardrailPackSnapshot $expected;

    /**
     * @var ?array<string> $confirmedAssistantIds Exact deduplicated impact acknowledged by the user; rechecked while the pack is locked.
     */
    #[JsonProperty('confirmedAssistantIds'), ArrayType(['string'])]
    public ?array $confirmedAssistantIds;

    /**
     * @param array{
     *   expected: GuardrailPackSnapshot,
     *   name?: ?string,
     *   ruleIds?: ?array<string>,
     *   confirmedAssistantIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'] ?? null;
        $this->ruleIds = $values['ruleIds'] ?? null;
        $this->expected = $values['expected'];
        $this->confirmedAssistantIds = $values['confirmedAssistantIds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
