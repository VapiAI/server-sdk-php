<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class FallbackCartesiaVoice extends JsonSerializableType
{
    /**
     * @var ?bool $cachingEnabled This is the flag to toggle voice caching for the assistant.
     */
    #[JsonProperty('cachingEnabled')]
    public ?bool $cachingEnabled;

    /**
     * @var string $voiceId The ID of the particular voice you want to use.
     */
    #[JsonProperty('voiceId')]
    public string $voiceId;

    /**
     * @var ?value-of<FallbackCartesiaVoiceModel> $model This is the model that will be used. This is optional and will default to the correct model for the voiceId.
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?value-of<FallbackCartesiaVoiceLanguage> $language This is the language that will be used. This is optional and will default to the correct language for the voiceId.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?CartesiaExperimentalControls $experimentalControls Experimental controls for Cartesia voice generation
     */
    #[JsonProperty('experimentalControls')]
    public ?CartesiaExperimentalControls $experimentalControls;

    /**
     * @var ?CartesiaGenerationConfig $generationConfig Generation config for fine-grained control of sonic-3 voice output (speed, volume, and experimental controls). Only available for sonic-3 model.
     */
    #[JsonProperty('generationConfig')]
    public ?CartesiaGenerationConfig $generationConfig;

    /**
     * @var ?string $pronunciationDictId Pronunciation dictionary ID for sonic-3. Allows custom pronunciations for specific words. Only available for sonic-3 model.
     */
    #[JsonProperty('pronunciationDictId')]
    public ?string $pronunciationDictId;

    /**
     * @var ?ChunkPlan $chunkPlan This is the plan for chunking the model output before it is sent to the voice provider.
     */
    #[JsonProperty('chunkPlan')]
    public ?ChunkPlan $chunkPlan;

    /**
     * @param array{
     *   voiceId: string,
     *   cachingEnabled?: ?bool,
     *   model?: ?value-of<FallbackCartesiaVoiceModel>,
     *   language?: ?value-of<FallbackCartesiaVoiceLanguage>,
     *   experimentalControls?: ?CartesiaExperimentalControls,
     *   generationConfig?: ?CartesiaGenerationConfig,
     *   pronunciationDictId?: ?string,
     *   chunkPlan?: ?ChunkPlan,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cachingEnabled = $values['cachingEnabled'] ?? null;
        $this->voiceId = $values['voiceId'];
        $this->model = $values['model'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->experimentalControls = $values['experimentalControls'] ?? null;
        $this->generationConfig = $values['generationConfig'] ?? null;
        $this->pronunciationDictId = $values['pronunciationDictId'] ?? null;
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
