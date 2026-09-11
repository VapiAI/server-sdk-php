<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * Configuration for transcribing speech during assistant conversations with Soniox, including model, language detection, endpointing, vocabulary, and fallback settings.
 */
class SonioxTranscriber extends JsonSerializableType
{
    /**
     * @var ?value-of<SonioxTranscriberModel> $model The Soniox model to use for transcription.
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?value-of<SonioxTranscriberLanguage> $language Single language for transcription as an ISO 639-1 code (e.g., `en`, `es`). For multi-language hints or to enable Soniox auto-detect, use `languages` instead — when `languages` is set (including to an empty array), this field is ignored when building the Soniox request. Defaults to `en` if neither this nor `languages` is set.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?array<value-of<SonioxTranscriberLanguagesItem>> $languages Language hints sent to Soniox as `language_hints`. Provide `[lang1, lang2, ...]` (ISO 639-1 codes) to bias recognition toward specific languages, or provide an explicit empty array `[]` to enable Soniox auto-detect across all 60+ supported languages. When set (including the empty array), this field takes precedence over the singular `language` field. When omitted, falls back to the singular `language` (which defaults to `en` if also unset). Best accuracy is achieved with a single language.
     */
    #[JsonProperty('languages'), ArrayType(['string'])]
    public ?array $languages;

    /**
     * @var ?bool $languageHintsStrict When `true`, Soniox strictly restricts transcription to the languages in `languages` (or the singular `language` if `languages` is unset). When `false`, Soniox biases toward those languages but still allows transcription in other languages. Has no effect when no language hints are sent (e.g., `languages: []` for auto-detect). Defaults to `true` (strict mode).
     */
    #[JsonProperty('languageHintsStrict')]
    public ?bool $languageHintsStrict;

    /**
     * @var ?float $maxEndpointDelayMs Maximum delay in milliseconds between when the speaker stops and when the endpoint is detected. Lower values mean faster turn-taking but more false endpoints. Range: 500-3000. Default: 500.
     */
    #[JsonProperty('maxEndpointDelayMs')]
    public ?float $maxEndpointDelayMs;

    /**
     * @var ?float $endpointSensitivity How likely Soniox is to emit an endpoint (end the caller turn). Higher values make endpoints more likely for faster turn-taking; negative values make them less likely, which helps when callers pause mid-sentence (e.g. reading numbers group by group). Range: -1.0 to 1.0. Default: 0.3 (the platform low-latency voice profile; Soniox's own default is 0.0). Supported by stt-rt-v5; omitted from the Soniox request on explicit stt-rt-v4. Soniox recommends tuning endpointLatencyAdjustmentLevel first, and advises against negative sensitivity while the level is above 0 (the settings work against each other).
     */
    #[JsonProperty('endpointSensitivity')]
    public ?float $endpointSensitivity;

    /**
     * @var ?float $endpointLatencyAdjustmentLevel How aggressively Soniox reduces endpoint latency. 0 is Soniox's default semantic endpointing; 3 is the most aggressive. Higher levels return endpoints sooner but may split speech into more segments and slightly reduce accuracy. Integer. Range: 0-3. Default: 2 (the platform low-latency voice profile; Soniox's own default is 0). Supported by stt-rt-v5; omitted from the Soniox request on explicit stt-rt-v4.
     */
    #[JsonProperty('endpointLatencyAdjustmentLevel')]
    public ?float $endpointLatencyAdjustmentLevel;

    /**
     * @var ?array<string> $customVocabulary Custom vocabulary terms to boost recognition accuracy. Useful for brand names, product names, and domain-specific terminology. Maps to Soniox context.terms.
     */
    #[JsonProperty('customVocabulary'), ArrayType(['string'])]
    public ?array $customVocabulary;

    /**
     * @var ?array<SonioxContextGeneralItem> $contextGeneral General context key-value pairs that guide the AI model during transcription. Helps adapt vocabulary to the correct domain, improving accuracy. Recommended: 10 or fewer pairs. Maps to Soniox context.general.
     */
    #[JsonProperty('contextGeneral'), ArrayType([SonioxContextGeneralItem::class])]
    public ?array $contextGeneral;

    /**
     * @var ?FallbackTranscriberPlan $fallbackPlan This is the plan for transcriber provider fallbacks in the event that the primary transcriber provider fails.
     */
    #[JsonProperty('fallbackPlan')]
    public ?FallbackTranscriberPlan $fallbackPlan;

    /**
     * @param array{
     *   model?: ?value-of<SonioxTranscriberModel>,
     *   language?: ?value-of<SonioxTranscriberLanguage>,
     *   languages?: ?array<value-of<SonioxTranscriberLanguagesItem>>,
     *   languageHintsStrict?: ?bool,
     *   maxEndpointDelayMs?: ?float,
     *   endpointSensitivity?: ?float,
     *   endpointLatencyAdjustmentLevel?: ?float,
     *   customVocabulary?: ?array<string>,
     *   contextGeneral?: ?array<SonioxContextGeneralItem>,
     *   fallbackPlan?: ?FallbackTranscriberPlan,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->model = $values['model'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->languages = $values['languages'] ?? null;
        $this->languageHintsStrict = $values['languageHintsStrict'] ?? null;
        $this->maxEndpointDelayMs = $values['maxEndpointDelayMs'] ?? null;
        $this->endpointSensitivity = $values['endpointSensitivity'] ?? null;
        $this->endpointLatencyAdjustmentLevel = $values['endpointLatencyAdjustmentLevel'] ?? null;
        $this->customVocabulary = $values['customVocabulary'] ?? null;
        $this->contextGeneral = $values['contextGeneral'] ?? null;
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
