<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class VapiVoiceCloneDto extends JsonSerializableType
{
    /**
     * @var string $name Display name for the cloned voice.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * Optional language (ISO-639 / BCP-47). When omitted, xAI infers it from the
     * reference audio.
     *
     * @var ?string $language
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var array<string> $files Reference audio to clone the voice from (up to 120 seconds). Supported formats: MP3, WAV, OGG/Opus, WebM, AAC, M4A, FLAC, WMA.
     */
    #[JsonProperty('files'), ArrayType(['string'])]
    public array $files;

    /**
     * @param array{
     *   name: string,
     *   files: array<string>,
     *   language?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->language = $values['language'] ?? null;
        $this->files = $values['files'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
