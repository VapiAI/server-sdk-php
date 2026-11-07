<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class OpenAiSpeaker extends JsonSerializableType
{
    /**
     * @var ?string $instructions Omit to use model.systemPrompt, or system-role messages when systemPrompt is absent. An explicit empty string is preserved.
     */
    #[JsonProperty('instructions')]
    public ?string $instructions;

    /**
     * @var ?array<value-of<OpenAiSpeakerPersonalityPacksItem>> $personalityPacks Personality packs append speaking-style guidance to the speaker prompt. Set to an array of pack IDs and test one pack at a time. These are prompt instructions, not fixed speed controls.
     */
    #[JsonProperty('personalityPacks'), ArrayType(['string'])]
    public ?array $personalityPacks;

    /**
     * @param array{
     *   instructions?: ?string,
     *   personalityPacks?: ?array<value-of<OpenAiSpeakerPersonalityPacksItem>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->instructions = $values['instructions'] ?? null;
        $this->personalityPacks = $values['personalityPacks'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
