<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * Fallback configuration for synthesizing assistant speech with Vapi, including voice selection, speed, pronunciation dictionary, chunking, and caching.
 */
class FallbackVapiVoice extends JsonSerializableType
{
    /**
     * @var ?bool $cachingEnabled This is the flag to toggle voice caching for the assistant.
     */
    #[JsonProperty('cachingEnabled')]
    public ?bool $cachingEnabled;

    /**
     * @var string $voiceId The voice to use: a built-in Vapi voice name, or a cloned voice id (used with version 2).
     */
    #[JsonProperty('voiceId')]
    public string $voiceId;

    /**
     * @var ?value-of<FallbackVapiVoiceVersion> $version The Vapi voice routing generation. `latest` auto-updates to the newest generation; version 1 uses legacy mappings; version 2 can use xAI-backed voices when available. When omitted, Version 1 is used. Accepts the string channel ('latest', '1', '2'); legacy numeric values (1, 2) are also accepted and coerced to their string form.
     */
    #[JsonProperty('version')]
    public ?string $version;

    /**
     * This is the speed multiplier that will be used.
     *
     * @default 1
     *
     * @var ?float $speed
     */
    #[JsonProperty('speed')]
    public ?float $speed;

    /**
     * @var ?value-of<FallbackVapiVoiceLanguage> $language Language for Vapi voice synthesis. For Version 2, omit this field or set `auto` for automatic language detection. Version 1 supports legacy Vapi language values.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?array<VapiPronunciationDictionaryLocator> $pronunciationDictionary List of pronunciation dictionary locators for custom word pronunciations.
     */
    #[JsonProperty('pronunciationDictionary'), ArrayType([VapiPronunciationDictionaryLocator::class])]
    public ?array $pronunciationDictionary;

    /**
     * @var ?ChunkPlan $chunkPlan This is the plan for chunking the model output before it is sent to the voice provider.
     */
    #[JsonProperty('chunkPlan')]
    public ?ChunkPlan $chunkPlan;

    /**
     * @param array{
     *   voiceId: string,
     *   cachingEnabled?: ?bool,
     *   version?: ?value-of<FallbackVapiVoiceVersion>,
     *   speed?: ?float,
     *   language?: ?value-of<FallbackVapiVoiceLanguage>,
     *   pronunciationDictionary?: ?array<VapiPronunciationDictionaryLocator>,
     *   chunkPlan?: ?ChunkPlan,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cachingEnabled = $values['cachingEnabled'] ?? null;
        $this->voiceId = $values['voiceId'];
        $this->version = $values['version'] ?? null;
        $this->speed = $values['speed'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->pronunciationDictionary = $values['pronunciationDictionary'] ?? null;
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
