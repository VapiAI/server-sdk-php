<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TranscriptKeyValueResult extends JsonSerializableType
{
    /**
     * @var float $index This is the key value's position in the answer key.
     */
    #[JsonProperty('index')]
    public float $index;

    /**
     * This is the key value as the answer key wrote it. Absent for organizations
     * with HIPAA, PCI or zero data retention enabled.
     *
     * @var ?string $value
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * This is how the value came through.
     * - exact: letter for letter, or as an accepted variant
     * - near: a close spelling, at most about one wrong letter in five
     * - missed: not found
     *
     * @var value-of<TranscriptKeyValueResultVerdict> $verdict
     */
    #[JsonProperty('verdict')]
    public string $verdict;

    /**
     * This is whether this key value had to come through exactly for the
     * simulation to pass. Kept for every organization, since it carries no answer-key text.
     *
     * @var bool $required
     */
    #[JsonProperty('required')]
    public bool $required;

    /**
     * @param array{
     *   index: float,
     *   verdict: value-of<TranscriptKeyValueResultVerdict>,
     *   required: bool,
     *   value?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->index = $values['index'];
        $this->value = $values['value'] ?? null;
        $this->verdict = $values['verdict'];
        $this->required = $values['required'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
