<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * Configuration for transcribing speech during assistant conversations with OpenAI, including model, language, and fallback settings.
 */
class OpenAiTranscriber extends JsonSerializableType
{
    /**
     * This is the model that will be used for the transcription.
     * Digit formatting can differ by model: `gpt-transcribe` may write spoken digit strings as words (for example, "four seven two"), where `gpt-4o-transcribe` and `gpt-4o-mini-transcribe` may write them as digits ("472"). Do not rely on either format.
     *
     * @var value-of<OpenAiTranscriberModel> $model
     */
    #[JsonProperty('model')]
    public string $model;

    /**
     * @var ?value-of<OpenAiTranscriberLanguage> $language This is the language that will be set for the transcription.
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
     * @var ?FallbackTranscriberPlan $fallbackPlan This is the plan for transcriber provider fallbacks in the event that the primary transcriber provider fails.
     */
    #[JsonProperty('fallbackPlan')]
    public ?FallbackTranscriberPlan $fallbackPlan;

    /**
     * @param array{
     *   model: value-of<OpenAiTranscriberModel>,
     *   language?: ?value-of<OpenAiTranscriberLanguage>,
     *   keywords?: ?array<string>,
     *   prompt?: ?string,
     *   fallbackPlan?: ?FallbackTranscriberPlan,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->model = $values['model'];
        $this->language = $values['language'] ?? null;
        $this->keywords = $values['keywords'] ?? null;
        $this->prompt = $values['prompt'] ?? null;
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
