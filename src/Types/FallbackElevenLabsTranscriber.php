<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class FallbackElevenLabsTranscriber extends JsonSerializableType
{
    /**
     * @var ?value-of<FallbackElevenLabsTranscriberModel> $model This is the model that will be used for the transcription.
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?value-of<FallbackElevenLabsTranscriberLanguage> $language This is the language that will be used for the transcription.
     */
    #[JsonProperty('language')]
    public ?string $language;

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
