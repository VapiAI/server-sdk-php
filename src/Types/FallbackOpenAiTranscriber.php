<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * Fallback configuration for transcribing speech with OpenAI, including model and language.
 */
class FallbackOpenAiTranscriber extends JsonSerializableType
{
    /**
     * This is the model that will be used for the transcription.
     * Digit formatting can differ by model: `gpt-transcribe` may write spoken digit strings as words (for example, "four seven two"), where `gpt-4o-transcribe` and `gpt-4o-mini-transcribe` may write them as digits ("472"). Do not rely on either format.
     *
     * @var value-of<FallbackOpenAiTranscriberModel> $model
     */
    #[JsonProperty('model')]
    public string $model;

    /**
     * @var ?value-of<FallbackOpenAiTranscriberLanguage> $language This is the language that will be set for the transcription.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * These are words and phrases the model should recognize, such as names, brands, and product terms.
     * Supported only by `gpt-transcribe`. Each keyword is one line and must not contain `<` or `>`. Maximum 16,384 keywords.
     *
     * @var ?array<string> $keywords
     */
    #[JsonProperty('keywords'), ArrayType(['string'])]
    public ?array $keywords;

    /**
     * This is free-text context for the transcription, such as the topic of the call or the expected vocabulary.
     * Maximum length: 8,192 characters for `gpt-transcribe`, and 1,024 characters for `gpt-4o-transcribe` and `gpt-4o-mini-transcribe`.
     *
     * @var ?string $prompt
     */
    #[JsonProperty('prompt')]
    public ?string $prompt;

    /**
     * @param array{
     *   model: value-of<FallbackOpenAiTranscriberModel>,
     *   language?: ?value-of<FallbackOpenAiTranscriberLanguage>,
     *   keywords?: ?array<string>,
     *   prompt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->model = $values['model'];
        $this->language = $values['language'] ?? null;
        $this->keywords = $values['keywords'] ?? null;
        $this->prompt = $values['prompt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
