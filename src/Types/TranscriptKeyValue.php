<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class TranscriptKeyValue extends JsonSerializableType
{
    /**
     * This is the value as the answer key writes it. It matches the same words in
     * the same order, ignoring case and punctuation, or the value spelled out letter
     * by letter ("Maria" matches "M A R I A"). Split into different words, it
     * scores near ("HubSpot" heard as "hub spot"), so list such forms in
     * acceptedVariants when the value is required.
     *
     * @var string $value
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * These are other spellings that count as the same value, such as "Rayner"
     * for "Raynor".
     *
     * @var ?array<string> $acceptedVariants
     */
    #[JsonProperty('acceptedVariants'), ArrayType(['string'])]
    public ?array $acceptedVariants;

    /**
     * This is whether the simulation fails unless this value comes through
     * exactly. Defaults to false: the verdict is reported but does not decide
     * pass or fail.
     *
     * @var ?bool $required
     */
    #[JsonProperty('required')]
    public ?bool $required;

    /**
     * @param array{
     *   value: string,
     *   acceptedVariants?: ?array<string>,
     *   required?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->value = $values['value'];
        $this->acceptedVariants = $values['acceptedVariants'] ?? null;
        $this->required = $values['required'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
