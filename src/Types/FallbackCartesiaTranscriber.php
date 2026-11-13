<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Fallback configuration for transcribing speech with Cartesia, including model and language.
 */
class FallbackCartesiaTranscriber extends JsonSerializableType
{
    /**
     * @var ?value-of<FallbackCartesiaTranscriberModel> $model The Cartesia speech-to-text model used for transcription.
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?value-of<FallbackCartesiaTranscriberLanguage> $language The language code used for transcription.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @param array{
     *   model?: ?value-of<FallbackCartesiaTranscriberModel>,
     *   language?: ?value-of<FallbackCartesiaTranscriberLanguage>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->model = $values['model'] ?? null;
        $this->language = $values['language'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
