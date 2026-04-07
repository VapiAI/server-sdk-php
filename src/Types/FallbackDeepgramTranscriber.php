<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class FallbackDeepgramTranscriber extends JsonSerializableType
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
     * Transcripts below this confidence threshold will be discarded.
     *
     * @default 0.4
     *
     * @var ?float $confidenceThreshold
     */
    #[JsonProperty('confidenceThreshold')]
    public ?float $confidenceThreshold;

    /**
     * @var ?float $eagerEotThreshold Eager end-of-turn confidence required to fire a eager end-of-turn event. Setting a value here will enable EagerEndOfTurn and SpeechResumed events. It is disabled by default. Only used with Flux models.
     */
    #[JsonProperty('eagerEotThreshold')]
    public ?float $eagerEotThreshold;

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
     * @param array{
     *   model?: ?value-of<DeepgramTranscriberModel>,
     *   language?: ?value-of<DeepgramTranscriberLanguage>,
     *   smartFormat?: ?bool,
     *   mipOptOut?: ?bool,
     *   numerals?: ?bool,
     *   profanityFilter?: ?bool,
     *   confidenceThreshold?: ?float,
     *   eagerEotThreshold?: ?float,
     *   eotThreshold?: ?float,
     *   eotTimeoutMs?: ?float,
     *   keywords?: ?array<string>,
     *   keyterm?: ?array<string>,
     *   endpointing?: ?float,
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
        $this->confidenceThreshold = $values['confidenceThreshold'] ?? null;
        $this->eagerEotThreshold = $values['eagerEotThreshold'] ?? null;
        $this->eotThreshold = $values['eotThreshold'] ?? null;
        $this->eotTimeoutMs = $values['eotTimeoutMs'] ?? null;
        $this->keywords = $values['keywords'] ?? null;
        $this->keyterm = $values['keyterm'] ?? null;
        $this->endpointing = $values['endpointing'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
