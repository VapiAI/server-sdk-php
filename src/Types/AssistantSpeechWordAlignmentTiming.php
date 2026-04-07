<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class AssistantSpeechWordAlignmentTiming extends JsonSerializableType
{
    /**
     * @var array<string> $words The individual words in this audio segment.
     */
    #[JsonProperty('words'), ArrayType(['string'])]
    public array $words;

    /**
     * @var array<float> $wordsStartTimesMs Start time in milliseconds for each word (parallel to `words`).
     */
    #[JsonProperty('wordsStartTimesMs'), ArrayType(['float'])]
    public array $wordsStartTimesMs;

    /**
     * @var array<float> $wordsEndTimesMs End time in milliseconds for each word (parallel to `words`).
     */
    #[JsonProperty('wordsEndTimesMs'), ArrayType(['float'])]
    public array $wordsEndTimesMs;

    /**
     * @param array{
     *   words: array<string>,
     *   wordsStartTimesMs: array<float>,
     *   wordsEndTimesMs: array<float>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->words = $values['words'];
        $this->wordsStartTimesMs = $values['wordsStartTimesMs'];
        $this->wordsEndTimesMs = $values['wordsEndTimesMs'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
