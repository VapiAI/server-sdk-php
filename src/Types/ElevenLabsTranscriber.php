<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * Configuration for transcribing speech during assistant conversations with ElevenLabs, including model, language, speech thresholds, and fallback settings.
 */
class ElevenLabsTranscriber extends JsonSerializableType
{
    /**
     * @var ?value-of<ElevenLabsTranscriberModel> $model This is the model that will be used for the transcription.
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?value-of<ElevenLabsTranscriberLanguage> $language This is the language that will be used for the transcription.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?array<string> $keyterms Words or phrases to bias the transcription towards, such as product names. Supported on scribe_v2 (up to 100 terms of 50 characters each) and scribe_v2_realtime (up to 50 terms of 20 characters each). Each term has at most 5 words and none of `< > { } [ ] \`. Adds ElevenLabs' keyterm prompting rate to the transcriber cost.
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
     * @var ?FallbackTranscriberPlan $fallbackPlan This is the plan for transcriber provider fallbacks in the event that the primary transcriber provider fails.
     */
    #[JsonProperty('fallbackPlan')]
    public ?FallbackTranscriberPlan $fallbackPlan;

    /**
     * @param array{
     *   model?: ?value-of<ElevenLabsTranscriberModel>,
     *   language?: ?value-of<ElevenLabsTranscriberLanguage>,
     *   keyterms?: ?array<string>,
     *   silenceThresholdSeconds?: ?float,
     *   confidenceThreshold?: ?float,
     *   minSpeechDurationMs?: ?float,
     *   minSilenceDurationMs?: ?float,
     *   fallbackPlan?: ?FallbackTranscriberPlan,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->model = $values['model'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->keyterms = $values['keyterms'] ?? null;
        $this->silenceThresholdSeconds = $values['silenceThresholdSeconds'] ?? null;
        $this->confidenceThreshold = $values['confidenceThreshold'] ?? null;
        $this->minSpeechDurationMs = $values['minSpeechDurationMs'] ?? null;
        $this->minSilenceDurationMs = $values['minSilenceDurationMs'] ?? null;
        $this->fallbackPlan = $values['fallbackPlan'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
