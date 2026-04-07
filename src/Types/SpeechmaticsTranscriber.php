<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SpeechmaticsTranscriber extends JsonSerializableType
{
    /**
     * @var ?value-of<SpeechmaticsTranscriberModel> $model This is the model that will be used for the transcription.
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?value-of<SpeechmaticsTranscriberLanguage> $language
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * This is the operating point for the transcription. Choose between `standard` for faster turnaround with strong accuracy or `enhanced` for highest accuracy when precision is critical.
     *
     * @default 'enhanced'
     *
     * @var ?value-of<SpeechmaticsTranscriberOperatingPoint> $operatingPoint
     */
    #[JsonProperty('operatingPoint')]
    public ?string $operatingPoint;

    /**
     * This is the region for the Speechmatics API. Choose between EU (Europe) and US (United States) regions for lower latency and data sovereignty compliance.
     *
     * @default 'eu'
     *
     * @var ?value-of<SpeechmaticsTranscriberRegion> $region
     */
    #[JsonProperty('region')]
    public ?string $region;

    /**
     * This enables speaker diarization, which identifies and separates speakers in the transcription. Essential for multi-speaker conversations and conference calls.
     *
     * @default false
     *
     * @var ?bool $enableDiarization
     */
    #[JsonProperty('enableDiarization')]
    public ?bool $enableDiarization;

    /**
     * This sets the maximum delay in milliseconds for partial transcripts. Balances latency and accuracy.
     *
     * @default 3000
     *
     * @var ?float $maxDelay
     */
    #[JsonProperty('maxDelay')]
    public ?float $maxDelay;

    /**
     * @var array<SpeechmaticsCustomVocabularyItem> $customVocabulary
     */
    #[JsonProperty('customVocabulary'), ArrayType([SpeechmaticsCustomVocabularyItem::class])]
    public array $customVocabulary;

    /**
     * This controls how numbers, dates, currencies, and other entities are formatted in the transcription output.
     *
     * @default 'written'
     *
     * @var ?value-of<SpeechmaticsTranscriberNumeralStyle> $numeralStyle
     */
    #[JsonProperty('numeralStyle')]
    public ?string $numeralStyle;

    /**
     * This is the sensitivity level for end-of-turn detection, which determines when a speaker has finished talking. Higher values are more sensitive.
     *
     * @default 0.5
     *
     * @var ?float $endOfTurnSensitivity
     */
    #[JsonProperty('endOfTurnSensitivity')]
    public ?float $endOfTurnSensitivity;

    /**
     * This enables removal of disfluencies (um, uh) from the transcript to create cleaner, more professional output.
     *
     * This is only supported for the English language transcriber.
     *
     * @default false
     *
     * @var ?bool $removeDisfluencies
     */
    #[JsonProperty('removeDisfluencies')]
    public ?bool $removeDisfluencies;

    /**
     * This is the minimum duration in seconds for speech segments. Shorter segments will be filtered out. Helps remove noise and improve accuracy.
     *
     * @default 0.0
     *
     * @var ?float $minimumSpeechDuration
     */
    #[JsonProperty('minimumSpeechDuration')]
    public ?float $minimumSpeechDuration;

    /**
     * @var ?FallbackTranscriberPlan $fallbackPlan This is the plan for transcriber provider fallbacks in the event that the primary transcriber provider fails.
     */
    #[JsonProperty('fallbackPlan')]
    public ?FallbackTranscriberPlan $fallbackPlan;

    /**
     * @param array{
     *   customVocabulary: array<SpeechmaticsCustomVocabularyItem>,
     *   model?: ?value-of<SpeechmaticsTranscriberModel>,
     *   language?: ?value-of<SpeechmaticsTranscriberLanguage>,
     *   operatingPoint?: ?value-of<SpeechmaticsTranscriberOperatingPoint>,
     *   region?: ?value-of<SpeechmaticsTranscriberRegion>,
     *   enableDiarization?: ?bool,
     *   maxDelay?: ?float,
     *   numeralStyle?: ?value-of<SpeechmaticsTranscriberNumeralStyle>,
     *   endOfTurnSensitivity?: ?float,
     *   removeDisfluencies?: ?bool,
     *   minimumSpeechDuration?: ?float,
     *   fallbackPlan?: ?FallbackTranscriberPlan,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->model = $values['model'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->operatingPoint = $values['operatingPoint'] ?? null;
        $this->region = $values['region'] ?? null;
        $this->enableDiarization = $values['enableDiarization'] ?? null;
        $this->maxDelay = $values['maxDelay'] ?? null;
        $this->customVocabulary = $values['customVocabulary'];
        $this->numeralStyle = $values['numeralStyle'] ?? null;
        $this->endOfTurnSensitivity = $values['endOfTurnSensitivity'] ?? null;
        $this->removeDisfluencies = $values['removeDisfluencies'] ?? null;
        $this->minimumSpeechDuration = $values['minimumSpeechDuration'] ?? null;
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
