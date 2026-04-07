<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SonioxTranscriber extends JsonSerializableType
{
    /**
     * @var ?value-of<SonioxTranscriberModel> $model The Soniox model to use for transcription.
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?value-of<SonioxTranscriberLanguage> $language The language for transcription. Uses ISO 639-1 codes. Soniox supports 60+ languages with a single universal model.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?bool $languageHintsStrict When enabled, restricts transcription to the language specified in the language field. When disabled, the model can detect and transcribe any of 60+ supported languages. Defaults to true.
     */
    #[JsonProperty('languageHintsStrict')]
    public ?bool $languageHintsStrict;

    /**
     * @var ?float $maxEndpointDelayMs Maximum delay in milliseconds between when the speaker stops and when the endpoint is detected. Lower values mean faster turn-taking but more false endpoints. Range: 500-3000. Default: 500.
     */
    #[JsonProperty('maxEndpointDelayMs')]
    public ?float $maxEndpointDelayMs;

    /**
     * @var ?array<string> $customVocabulary Custom vocabulary terms to boost recognition accuracy. Useful for brand names, product names, and domain-specific terminology. Maps to Soniox context.terms.
     */
    #[JsonProperty('customVocabulary'), ArrayType(['string'])]
    public ?array $customVocabulary;

    /**
     * @var ?FallbackTranscriberPlan $fallbackPlan This is the plan for transcriber provider fallbacks in the event that the primary transcriber provider fails.
     */
    #[JsonProperty('fallbackPlan')]
    public ?FallbackTranscriberPlan $fallbackPlan;

    /**
     * @param array{
     *   model?: ?value-of<SonioxTranscriberModel>,
     *   language?: ?value-of<SonioxTranscriberLanguage>,
     *   languageHintsStrict?: ?bool,
     *   maxEndpointDelayMs?: ?float,
     *   customVocabulary?: ?array<string>,
     *   fallbackPlan?: ?FallbackTranscriberPlan,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->model = $values['model'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->languageHintsStrict = $values['languageHintsStrict'] ?? null;
        $this->maxEndpointDelayMs = $values['maxEndpointDelayMs'] ?? null;
        $this->customVocabulary = $values['customVocabulary'] ?? null;
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
