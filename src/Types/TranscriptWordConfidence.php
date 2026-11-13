<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TranscriptWordConfidence extends JsonSerializableType
{
    /**
     * @var string $word The word as the transcriber recognised it.
     */
    #[JsonProperty('word')]
    public string $word;

    /**
     * Offset at which the word begins, measured from the start of the
     * transcriber stream (ElevenLabs, which transcribes each utterance as its
     * own request, measures from the start of that utterance's audio). The unit
     * is transcriber-specific today: seconds for Deepgram, Soniox, Gladia and
     * ElevenLabs realtime (`scribe_v2_realtime`); milliseconds for AssemblyAI,
     * ElevenLabs HTTP Scribe and Google. Transcribers without per-word timing
     * emit a placeholder, typically `0`.
     *
     * @var float $start
     */
    #[JsonProperty('start')]
    public float $start;

    /**
     * @var float $end Offset at which the word ends, with the same origin and unit as `start`.
     */
    #[JsonProperty('end')]
    public float $end;

    /**
     * The transcriber's confidence for this word, in [0, 1]. Transcribers that
     * report no per-word score, or whose stream does not map one (Cartesia,
     * ElevenLabs HTTP Scribe, Google, Talkscriber and custom transcribers), emit
     * `1` for every word; that placeholder is not a measurement. ElevenLabs
     * realtime passes through its token log-probability, which is not a [0, 1]
     * confidence.
     *
     * @var float $confidence
     */
    #[JsonProperty('confidence')]
    public float $confidence;

    /**
     * The word with punctuation and casing applied, when the transcriber
     * reports a punctuated form. The snake_case name deliberately mirrors the
     * transcriber wire spelling already stored on every existing message;
     * renaming it would break stored data.
     *
     * @var ?string $punctuatedWord
     */
    #[JsonProperty('punctuated_word')]
    public ?string $punctuatedWord;

    /**
     * @var ?string $language The language the transcriber detected for this word, when it reports one.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * The diarized speaker index this word was attributed to, when the
     * transcriber reports one.
     *
     * @var ?float $speaker
     */
    #[JsonProperty('speaker')]
    public ?float $speaker;

    /**
     * @param array{
     *   word: string,
     *   start: float,
     *   end: float,
     *   confidence: float,
     *   punctuatedWord?: ?string,
     *   language?: ?string,
     *   speaker?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->word = $values['word'];
        $this->start = $values['start'];
        $this->end = $values['end'];
        $this->confidence = $values['confidence'];
        $this->punctuatedWord = $values['punctuatedWord'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->speaker = $values['speaker'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
