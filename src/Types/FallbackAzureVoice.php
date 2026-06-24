<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class FallbackAzureVoice extends JsonSerializableType
{
    /**
     * @var ?bool $cachingEnabled This is the flag to toggle voice caching for the assistant.
     */
    #[JsonProperty('cachingEnabled')]
    public ?bool $cachingEnabled;

    /**
     * @var (
     *    value-of<FallbackAzureVoiceIdZero>
     *   |string
     * ) $voiceId This is the provider-specific ID that will be used.
     */
    #[JsonProperty('voiceId')]
    public string $voiceId;

    /**
     * @var ?float $speed This is the speed multiplier that will be used.
     */
    #[JsonProperty('speed')]
    public ?float $speed;

    /**
     * @var ?ChunkPlan $chunkPlan This is the plan for chunking the model output before it is sent to the voice provider.
     */
    #[JsonProperty('chunkPlan')]
    public ?ChunkPlan $chunkPlan;

    /**
     * @var mixed $oneOf
     */
    #[JsonProperty('oneOf')]
    public mixed $oneOf;

    /**
     * @param array{
     *   voiceId: (
     *    value-of<FallbackAzureVoiceIdZero>
     *   |string
     * ),
     *   cachingEnabled?: ?bool,
     *   speed?: ?float,
     *   chunkPlan?: ?ChunkPlan,
     *   oneOf?: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cachingEnabled = $values['cachingEnabled'] ?? null;
        $this->voiceId = $values['voiceId'];
        $this->speed = $values['speed'] ?? null;
        $this->chunkPlan = $values['chunkPlan'] ?? null;
        $this->oneOf = $values['oneOf'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
