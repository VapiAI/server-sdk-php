<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class XaiVoice extends JsonSerializableType
{
    /**
     * @var ?bool $cachingEnabled This is the flag to toggle voice caching for the assistant.
     */
    #[JsonProperty('cachingEnabled')]
    public ?bool $cachingEnabled;

    /**
     * @var value-of<XaiVoiceVoiceId> $voiceId Built-in voices: eve, ara, rex, sal, leo. Cloned voice IDs are also accepted.
     */
    #[JsonProperty('voiceId')]
    public string $voiceId;

    /**
     * @var ?value-of<XaiVoiceLanguage> $language BCP-47 language code for xAI TTS synthesis.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?float $speed Speed multiplier for xAI TTS synthesis.
     */
    #[JsonProperty('speed')]
    public ?float $speed;

    /**
     * @var ?ChunkPlan $chunkPlan This is the plan for chunking the model output before it is sent to the voice provider.
     */
    #[JsonProperty('chunkPlan')]
    public ?ChunkPlan $chunkPlan;

    /**
     * @var ?FallbackPlan $fallbackPlan This is the plan for voice provider fallbacks in the event that the primary voice provider fails.
     */
    #[JsonProperty('fallbackPlan')]
    public ?FallbackPlan $fallbackPlan;

    /**
     * @param array{
     *   voiceId: value-of<XaiVoiceVoiceId>,
     *   cachingEnabled?: ?bool,
     *   language?: ?value-of<XaiVoiceLanguage>,
     *   speed?: ?float,
     *   chunkPlan?: ?ChunkPlan,
     *   fallbackPlan?: ?FallbackPlan,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cachingEnabled = $values['cachingEnabled'] ?? null;
        $this->voiceId = $values['voiceId'];
        $this->language = $values['language'] ?? null;
        $this->speed = $values['speed'] ?? null;
        $this->chunkPlan = $values['chunkPlan'] ?? null;
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
