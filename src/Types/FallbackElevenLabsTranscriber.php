<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * Fallback configuration for transcribing speech with ElevenLabs, including model, language, and speech thresholds.
 */
class FallbackElevenLabsTranscriber extends JsonSerializableType
{
    /**
     * @var ?value-of<FallbackElevenLabsTranscriberModel> $model This is the model that will be used for the transcription.
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?value-of<FallbackElevenLabsTranscriberLanguage> $language Language for transcription. `multi` enables automatic code-switching on scribe_v3_live.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?array<value-of<FallbackElevenLabsTranscriberLanguagesItem>> $languages Language detection hints for scribe_v3_live. Duplicates are removed; [] explicitly clears inherited hints.
     */
    #[JsonProperty('languages'), ArrayType(['string'])]
    public ?array $languages;

    /**
     * @var ?array<string> $keyterms Words or phrases to bias the transcription towards, such as product names. Supported on scribe_v2 (up to 100 terms of 50 characters each) and scribe_v2_realtime or scribe_v3_live (up to 50 terms of 20 characters each). Each term has at most 5 words and none of `< > { } [ ] \`. Adds ElevenLabs' keyterm prompting rate to the transcriber cost.
     */
    #[JsonProperty('keyterms'), ArrayType(['string'])]
    public ?array $keyterms;

    /**
     * @var ?float $silenceThresholdSeconds This is the number of seconds of silence before VAD commits (0.3-3.0).
     */
    #[JsonProperty('silenceThresholdSeconds')]
    public ?float $silenceThresholdSeconds;

    /**
     * @var ?float $confidenceThreshold This is the VAD sensitivity (0.1-0.9, lower indicates more sensitive).
     */
    #[JsonProperty('confidenceThreshold')]
    public ?float $confidenceThreshold;

    /**
     * @var ?float $minSpeechDurationMs This is the minimum speech duration for VAD (50-2000ms).
     */
    #[JsonProperty('minSpeechDurationMs')]
    public ?float $minSpeechDurationMs;

    /**
     * @var ?float $minSilenceDurationMs This is the minimum silence duration for VAD (50-2000ms).
     */
    #[JsonProperty('minSilenceDurationMs')]
    public ?float $minSilenceDurationMs;

    /**
     * @param array{
     *   model?: ?value-of<FallbackElevenLabsTranscriberModel>,
     *   language?: ?value-of<FallbackElevenLabsTranscriberLanguage>,
     *   languages?: ?array<value-of<FallbackElevenLabsTranscriberLanguagesItem>>,
     *   keyterms?: ?array<string>,
     *   silenceThresholdSeconds?: ?float,
     *   confidenceThreshold?: ?float,
     *   minSpeechDurationMs?: ?float,
     *   minSilenceDurationMs?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->model = $values['model'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->languages = $values['languages'] ?? null;
        $this->keyterms = $values['keyterms'] ?? null;
        $this->silenceThresholdSeconds = $values['silenceThresholdSeconds'] ?? null;
        $this->confidenceThreshold = $values['confidenceThreshold'] ?? null;
        $this->minSpeechDurationMs = $values['minSpeechDurationMs'] ?? null;
        $this->minSilenceDurationMs = $values['minSilenceDurationMs'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
