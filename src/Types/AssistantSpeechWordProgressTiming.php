<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class AssistantSpeechWordProgressTiming extends JsonSerializableType
{
    /**
     * @var float $wordsSpoken Number of words spoken so far in this turn.
     */
    #[JsonProperty('wordsSpoken')]
    public float $wordsSpoken;

    /**
     * Total number of words sent to the TTS provider for this turn.
     *
     * **Important**: this value grows across events within a single turn because
     * Minimax synthesizes audio incrementally as the LLM streams tokens. Treat
     * it as "best known total so far" — it will stabilize once synthesis is
     * complete.
     *
     * A value of `0` is a valid sentinel meaning "not yet known". This can occur
     * on the very first `assistant-speech` event of a turn if audio begins
     * playing before the TTS provider has confirmed word-count data. Clients
     * **must** guard against divide-by-zero when computing a progress fraction:
     *
     * ```ts
     * const pct = totalWords > 0 ? wordsSpoken / totalWords : 0;
     * ```
     *
     * @var float $totalWords
     */
    #[JsonProperty('totalWords')]
    public float $totalWords;

    /**
     * The text of the latest spoken segment (sentence or clause). Use this
     * for caption display — it corresponds to the chunk just confirmed by
     * the TTS provider, unlike `text` on the parent message which carries
     * the full turn text.
     *
     * @var ?string $segment
     */
    #[JsonProperty('segment')]
    public ?string $segment;

    /**
     * Audio duration in milliseconds for the latest spoken segment. Pair
     * with `segment` to animate karaoke-style word reveals — divide the
     * segment text across this duration for approximate per-word timing.
     *
     * @var ?float $segmentDurationMs
     */
    #[JsonProperty('segmentDurationMs')]
    public ?float $segmentDurationMs;

    /**
     * Per-word timestamps for the latest spoken segment. Available when the
     * TTS provider supports word-level timing (e.g. Minimax with
     * subtitle_type: "word"). Syllables from the provider are aggregated
     * into whole words with start/end times relative to the segment start.
     *
     * Use these for precise karaoke-style highlighting instead of
     * interpolating from segmentDurationMs.
     *
     * @var ?array<AssistantSpeechWordTimestamp> $words
     */
    #[JsonProperty('words'), ArrayType([AssistantSpeechWordTimestamp::class])]
    public ?array $words;

    /**
     * @param array{
     *   wordsSpoken: float,
     *   totalWords: float,
     *   segment?: ?string,
     *   segmentDurationMs?: ?float,
     *   words?: ?array<AssistantSpeechWordTimestamp>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->wordsSpoken = $values['wordsSpoken'];
        $this->totalWords = $values['totalWords'];
        $this->segment = $values['segment'] ?? null;
        $this->segmentDurationMs = $values['segmentDurationMs'] ?? null;
        $this->words = $values['words'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
