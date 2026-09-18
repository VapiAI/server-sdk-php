<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * Configuration for transcribing speech during assistant conversations with Deepgram, including model, language, formatting, endpointing, vocabulary, and fallback settings.
 */
class DeepgramTranscriber extends JsonSerializableType
{
    /**
     * @var ?value-of<DeepgramTranscriberModel> $model This is the Deepgram model that will be used. A list of models can be found here: https://developers.deepgram.com/docs/models-languages-overview
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?value-of<DeepgramTranscriberLanguage> $language This is the language that will be set for the transcription. The list of languages Deepgram supports can be found here: https://developers.deepgram.com/docs/models-languages-overview
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?bool $smartFormat This will be use smart format option provided by Deepgram. It's default disabled because it can sometimes format numbers as times but it's getting better.
     */
    #[JsonProperty('smartFormat')]
    public ?bool $smartFormat;

    /**
     * If set to true, this will add mip_opt_out=true as a query parameter of all API requests. See https://developers.deepgram.com/docs/the-deepgram-model-improvement-partnership-program#want-to-opt-out
     *
     * This will only be used if you are using your own Deepgram API key.
     *
     * @default false
     *
     * @var ?bool $mipOptOut
     */
    #[JsonProperty('mipOptOut')]
    public ?bool $mipOptOut;

    /**
     * If set to true, this will cause deepgram to convert spoken numbers to literal numerals. For example, "my phone number is nine-seven-two..." would become "my phone number is 972..."
     *
     * @default false
     *
     * @var ?bool $numerals
     */
    #[JsonProperty('numerals')]
    public ?bool $numerals;

    /**
     * If set to true, Deepgram will replace profanity in transcripts with surrounding asterisks, e.g. "f***".
     *
     * @default false
     *
     * @var ?bool $profanityFilter
     */
    #[JsonProperty('profanityFilter')]
    public ?bool $profanityFilter;

    /**
     * Enables redaction of sensitive information from transcripts.
     *
     * Options include:
     * - "pci": Redacts credit card numbers, expiration dates, and CVV.
     * - "pii": Redacts personally identifiable information (names, locations, identifying numbers, etc.).
     * - "phi": Redacts protected health information (medical conditions, drugs, injuries, etc.).
     * - "numbers": Redacts numerical and identifying entities (dates, account numbers, SSNs, etc.).
     *
     * Multiple values can be provided to redact different categories simultaneously.
     * Redacted content is replaced with entity labels like [CREDIT_CARD_1], [SSN_1], etc.
     *
     * See https://developers.deepgram.com/docs/redaction for details.
     *
     * @var ?array<value-of<DeepgramTranscriberRedactionItem>> $redaction
     */
    #[JsonProperty('redaction'), ArrayType(['string'])]
    public ?array $redaction;

    /**
     * Transcripts below this confidence threshold will be discarded.
     *
     * @default 0.4
     *
     * @var ?float $confidenceThreshold
     */
    #[JsonProperty('confidenceThreshold')]
    public ?float $confidenceThreshold;

    /**
     * End-of-turn confidence required to finish a turn. Only used with Flux models.
     *
     * @default 0.7
     *
     * @var ?float $eotThreshold
     */
    #[JsonProperty('eotThreshold')]
    public ?float $eotThreshold;

    /**
     * A turn will be finished when this much time has passed after speech, regardless of EOT confidence. Only used with Flux models.
     *
     * @default 5000
     *
     * @var ?float $eotTimeoutMs
     */
    #[JsonProperty('eotTimeoutMs')]
    public ?float $eotTimeoutMs;

    /**
     * Language hints to bias Flux Multilingual (`flux-general-multi`) toward specific languages.
     * Provide BCP-47 language codes (e.g. "en", "es", "fr"). Multiple hints can be given for
     * multilingual or code-switching scenarios. Omit for auto-detection. Only used with `flux-general-multi`.
     *
     * @var ?array<string> $languages
     */
    #[JsonProperty('languages'), ArrayType(['string'])]
    public ?array $languages;

    /**
     * @var ?array<string> $keywords These keywords are passed to the transcription model to help it pick up use-case specific words. Anything that may not be a common word, like your company name, should be added here.
     */
    #[JsonProperty('keywords'), ArrayType(['string'])]
    public ?array $keywords;

    /**
     * @var ?array<string> $keyterm Keyterm Prompting allows you improve Keyword Recall Rate (KRR) for important keyterms or phrases up to 90%.
     */
    #[JsonProperty('keyterm'), ArrayType(['string'])]
    public ?array $keyterm;

    /**
     * This is the timeout after which Deepgram will send transcription on user silence. You can read in-depth documentation here: https://developers.deepgram.com/docs/endpointing.
     *
     * Here are the most important bits:
     * - Defaults to 10. This is recommended for most use cases to optimize for latency.
     * - 10 can cause some missing transcriptions since because of the shorter context. This mostly happens for one-word utterances. For those uses cases, it's recommended to try 300. It will add a bit of latency but the quality and reliability of the experience will be better.
     * - If neither 10 nor 300 work, contact support@vapi.ai and we'll find another solution.
     *
     * @default 10
     *
     * @var ?float $endpointing
     */
    #[JsonProperty('endpointing')]
    public ?float $endpointing;

    /**
     * @var ?FallbackTranscriberPlan $fallbackPlan This is the plan for transcriber provider fallbacks in the event that the primary transcriber provider fails.
     */
    #[JsonProperty('fallbackPlan')]
    public ?FallbackTranscriberPlan $fallbackPlan;

    /**
     * @param array{
     *   model?: ?value-of<DeepgramTranscriberModel>,
     *   language?: ?value-of<DeepgramTranscriberLanguage>,
     *   smartFormat?: ?bool,
     *   mipOptOut?: ?bool,
     *   numerals?: ?bool,
     *   profanityFilter?: ?bool,
     *   redaction?: ?array<value-of<DeepgramTranscriberRedactionItem>>,
     *   confidenceThreshold?: ?float,
     *   eotThreshold?: ?float,
     *   eotTimeoutMs?: ?float,
     *   languages?: ?array<string>,
     *   keywords?: ?array<string>,
     *   keyterm?: ?array<string>,
     *   endpointing?: ?float,
     *   fallbackPlan?: ?FallbackTranscriberPlan,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->model = $values['model'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->smartFormat = $values['smartFormat'] ?? null;
        $this->mipOptOut = $values['mipOptOut'] ?? null;
        $this->numerals = $values['numerals'] ?? null;
        $this->profanityFilter = $values['profanityFilter'] ?? null;
        $this->redaction = $values['redaction'] ?? null;
        $this->confidenceThreshold = $values['confidenceThreshold'] ?? null;
        $this->eotThreshold = $values['eotThreshold'] ?? null;
        $this->eotTimeoutMs = $values['eotTimeoutMs'] ?? null;
        $this->languages = $values['languages'] ?? null;
        $this->keywords = $values['keywords'] ?? null;
        $this->keyterm = $values['keyterm'] ?? null;
        $this->endpointing = $values['endpointing'] ?? null;
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
