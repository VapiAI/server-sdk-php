<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class FallbackMinimaxVoice extends JsonSerializableType
{
    /**
     * @var ?bool $cachingEnabled This is the flag to toggle voice caching for the assistant.
     */
    #[JsonProperty('cachingEnabled')]
    public ?bool $cachingEnabled;

    /**
     * @var value-of<FallbackMinimaxVoiceProvider> $provider This is the voice provider that will be used.
     */
    #[JsonProperty('provider')]
    public string $provider;

    /**
     * @var string $voiceId This is the provider-specific ID that will be used. Use a voice from MINIMAX_PREDEFINED_VOICES or a custom cloned voice ID.
     */
    #[JsonProperty('voiceId')]
    public string $voiceId;

    /**
     * This is the model that will be used. Options are 'speech-02-hd' and 'speech-02-turbo'.
     * speech-02-hd is optimized for high-fidelity applications like voiceovers and audiobooks.
     * speech-02-turbo is designed for real-time applications with low latency.
     *
     * @default "speech-02-turbo"
     *
     * @var ?value-of<FallbackMinimaxVoiceModel> $model
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * The emotion to use for the voice. If not provided, will use auto-detect mode.
     * Options include: 'happy', 'sad', 'angry', 'fearful', 'surprised', 'disgusted', 'neutral'
     *
     * @var ?string $emotion
     */
    #[JsonProperty('emotion')]
    public ?string $emotion;

    /**
     * Controls the granularity of subtitle/timing data returned by Minimax
     * during synthesis. Set to 'word' to receive per-word timestamps in
     * assistant.speechStarted events for karaoke-style caption rendering.
     *
     * @default "sentence"
     *
     * @var ?value-of<FallbackMinimaxVoiceSubtitleType> $subtitleType
     */
    #[JsonProperty('subtitleType')]
    public ?string $subtitleType;

    /**
     * Voice pitch adjustment. Range from -12 to 12 semitones.
     * @default 0
     *
     * @var ?float $pitch
     */
    #[JsonProperty('pitch')]
    public ?float $pitch;

    /**
     * Voice speed adjustment. Range from 0.5 to 2.0.
     * @default 1.0
     *
     * @var ?float $speed
     */
    #[JsonProperty('speed')]
    public ?float $speed;

    /**
     * Voice volume adjustment. Range from 0.5 to 2.0.
     * @default 1.0
     *
     * @var ?float $volume
     */
    #[JsonProperty('volume')]
    public ?float $volume;

    /**
     * @var ?value-of<FallbackMinimaxVoiceRegion> $region The region for Minimax API. Defaults to "worldwide".
     */
    #[JsonProperty('region')]
    public ?string $region;

    /**
     * @var ?value-of<FallbackMinimaxVoiceLanguageBoost> $languageBoost Language hint for MiniMax T2A. Example: yue (Cantonese), zh (Chinese), en (English).
     */
    #[JsonProperty('languageBoost')]
    public ?string $languageBoost;

    /**
     * @var ?bool $textNormalizationEnabled Enable MiniMax text normalization to improve number reading and formatting.
     */
    #[JsonProperty('textNormalizationEnabled')]
    public ?bool $textNormalizationEnabled;

    /**
     * @var ?ChunkPlan $chunkPlan This is the plan for chunking the model output before it is sent to the voice provider.
     */
    #[JsonProperty('chunkPlan')]
    public ?ChunkPlan $chunkPlan;

    /**
     * @param array{
     *   provider: value-of<FallbackMinimaxVoiceProvider>,
     *   voiceId: string,
     *   cachingEnabled?: ?bool,
     *   model?: ?value-of<FallbackMinimaxVoiceModel>,
     *   emotion?: ?string,
     *   subtitleType?: ?value-of<FallbackMinimaxVoiceSubtitleType>,
     *   pitch?: ?float,
     *   speed?: ?float,
     *   volume?: ?float,
     *   region?: ?value-of<FallbackMinimaxVoiceRegion>,
     *   languageBoost?: ?value-of<FallbackMinimaxVoiceLanguageBoost>,
     *   textNormalizationEnabled?: ?bool,
     *   chunkPlan?: ?ChunkPlan,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cachingEnabled = $values['cachingEnabled'] ?? null;
        $this->provider = $values['provider'];
        $this->voiceId = $values['voiceId'];
        $this->model = $values['model'] ?? null;
        $this->emotion = $values['emotion'] ?? null;
        $this->subtitleType = $values['subtitleType'] ?? null;
        $this->pitch = $values['pitch'] ?? null;
        $this->speed = $values['speed'] ?? null;
        $this->volume = $values['volume'] ?? null;
        $this->region = $values['region'] ?? null;
        $this->languageBoost = $values['languageBoost'] ?? null;
        $this->textNormalizationEnabled = $values['textNormalizationEnabled'] ?? null;
        $this->chunkPlan = $values['chunkPlan'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
