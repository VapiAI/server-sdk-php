<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class TranscriptAnswerKey extends JsonSerializableType
{
    /**
     * This is the verbatim transcript of everything the recording contains. A
     * mixed recording of both parties needs both parties' words, in order. At
     * most 30,000 words.
     *
     * @var string $transcript
     */
    #[JsonProperty('transcript')]
    public string $transcript;

    /**
     * These are values the transcript must carry, each scored exact, near or
     * missed.
     *
     * @var ?array<TranscriptKeyValue> $keyValues
     */
    #[JsonProperty('keyValues'), ArrayType([TranscriptKeyValue::class])]
    public ?array $keyValues;

    /**
     * @param array{
     *   transcript: string,
     *   keyValues?: ?array<TranscriptKeyValue>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->transcript = $values['transcript'];
        $this->keyValues = $values['keyValues'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
