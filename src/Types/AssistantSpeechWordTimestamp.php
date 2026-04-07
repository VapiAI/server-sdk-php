<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AssistantSpeechWordTimestamp extends JsonSerializableType
{
    /**
     * @var string $word The full word text (syllables aggregated into complete words).
     */
    #[JsonProperty('word')]
    public string $word;

    /**
     * @var float $startMs Start time in milliseconds relative to the segment start.
     */
    #[JsonProperty('startMs')]
    public float $startMs;

    /**
     * @var float $endMs End time in milliseconds relative to the segment start.
     */
    #[JsonProperty('endMs')]
    public float $endMs;

    /**
     * @param array{
     *   word: string,
     *   startMs: float,
     *   endMs: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->word = $values['word'];
        $this->startMs = $values['startMs'];
        $this->endMs = $values['endMs'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
