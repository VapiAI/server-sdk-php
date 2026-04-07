<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class WellSaidVoice extends JsonSerializableType
{
    /**
     * @var ?bool $cachingEnabled This is the flag to toggle voice caching for the assistant.
     */
    #[JsonProperty('cachingEnabled')]
    public ?bool $cachingEnabled;

    /**
     * @var string $voiceId The WellSaid speaker ID to synthesize.
     */
    #[JsonProperty('voiceId')]
    public string $voiceId;

    /**
     * @var ?value-of<WellSaidVoiceModel> $model This is the model that will be used.
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?bool $enableSsml Enables limited SSML translation for input text.
     */
    #[JsonProperty('enableSsml')]
    public ?bool $enableSsml;

    /**
     * @var ?array<string> $libraryIds Array of library IDs to use for voice synthesis.
     */
    #[JsonProperty('libraryIds'), ArrayType(['string'])]
    public ?array $libraryIds;

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
     *   voiceId: string,
     *   cachingEnabled?: ?bool,
     *   model?: ?value-of<WellSaidVoiceModel>,
     *   enableSsml?: ?bool,
     *   libraryIds?: ?array<string>,
     *   chunkPlan?: ?ChunkPlan,
     *   fallbackPlan?: ?FallbackPlan,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cachingEnabled = $values['cachingEnabled'] ?? null;
        $this->voiceId = $values['voiceId'];
        $this->model = $values['model'] ?? null;
        $this->enableSsml = $values['enableSsml'] ?? null;
        $this->libraryIds = $values['libraryIds'] ?? null;
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
