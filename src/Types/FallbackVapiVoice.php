<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class FallbackVapiVoice extends JsonSerializableType
{
    /**
     * @var ?bool $cachingEnabled This is the flag to toggle voice caching for the assistant.
     */
    #[JsonProperty('cachingEnabled')]
    public ?bool $cachingEnabled;

    /**
     * @var value-of<FallbackVapiVoiceVoiceId> $voiceId The voices provided by Vapi
     */
    #[JsonProperty('voiceId')]
    public string $voiceId;

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
     *   voiceId: value-of<FallbackVapiVoiceVoiceId>,
     *   cachingEnabled?: ?bool,
     *   speed?: ?float,
     *   pronunciationDictionary?: ?array<VapiPronunciationDictionaryLocator>,
     *   chunkPlan?: ?ChunkPlan,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cachingEnabled = $values['cachingEnabled'] ?? null;
        $this->voiceId = $values['voiceId'];
        $this->speed = $values['speed'] ?? null;
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
