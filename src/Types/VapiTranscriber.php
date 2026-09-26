<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class VapiTranscriber extends JsonSerializableType
{
    /**
     * This is the version of the Vapi transcriber. Vapi manages the underlying
     * model and routing. When omitted, the latest version is used.
     *
     * Managed version params are additive-only and `'latest'` is an auto-update
     * channel — see the param-evolution INVARIANT in `vapiManaged/types.ts`.
     *
     * @var ?value-of<VapiTranscriberVersion> $version
     */
    #[JsonProperty('version')]
    public ?string $version;

    /**
     * This is the language for transcription as an ISO 639-1 code (e.g. `en`).
     * Selecting a language locks transcription to it. For multiple languages,
     * use `languages` instead. When neither `language` nor `languages` is set,
     * the transcriber auto-detects the spoken language.
     *
     * @var ?value-of<VapiTranscriberLanguage> $language
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * These are the languages for transcription as ISO 639-1 codes. Set one or
     * more codes to restrict and bias recognition to those languages. An empty
     * array `[]` (or omitting both this and `language`) enables auto-detection
     * of the spoken language.
     *
     * @var ?array<value-of<VapiTranscriberLanguagesItem>> $languages
     */
    #[JsonProperty('languages'), ArrayType(['string'])]
    public ?array $languages;

    /**
     * These are custom keywords/vocabulary to boost recognition of use-case
     * specific words (company names, product names, jargon).
     *
     * @var ?array<string> $keywords
     */
    #[JsonProperty('keywords'), ArrayType(['string'])]
    public ?array $keywords;

    /**
     * This is the turn-taking mode. `intelligent` uses the underlying model's
     * native end-of-turn detection; `manual` ignores it and waits a fixed
     * end-of-turn delay. Defaults to `intelligent`.
     *
     * @var ?value-of<VapiTranscriberTurnTaking> $turnTaking
     */
    #[JsonProperty('turnTaking')]
    public ?string $turnTaking;

    /**
     * @param array{
     *   version?: ?value-of<VapiTranscriberVersion>,
     *   language?: ?value-of<VapiTranscriberLanguage>,
     *   languages?: ?array<value-of<VapiTranscriberLanguagesItem>>,
     *   keywords?: ?array<string>,
     *   turnTaking?: ?value-of<VapiTranscriberTurnTaking>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->version = $values['version'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->languages = $values['languages'] ?? null;
        $this->keywords = $values['keywords'] ?? null;
        $this->turnTaking = $values['turnTaking'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
