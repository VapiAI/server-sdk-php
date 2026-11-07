<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Configuration for transcribing speech during assistant conversations with Cartesia, including model, language, and fallback settings.
 */
class CartesiaTranscriber extends JsonSerializableType
{
    /**
     * @var ?value-of<CartesiaTranscriberModel> $model The Cartesia speech-to-text model used for transcription.
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?value-of<CartesiaTranscriberLanguage> $language The language code used for transcription.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?FallbackTranscriberPlan $fallbackPlan This is the plan for transcriber provider fallbacks in the event that the primary transcriber provider fails.
     */
    #[JsonProperty('fallbackPlan')]
    public ?FallbackTranscriberPlan $fallbackPlan;

    /**
     * @param array{
     *   model?: ?value-of<CartesiaTranscriberModel>,
     *   language?: ?value-of<CartesiaTranscriberLanguage>,
     *   fallbackPlan?: ?FallbackTranscriberPlan,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->model = $values['model'] ?? null;
        $this->language = $values['language'] ?? null;
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
