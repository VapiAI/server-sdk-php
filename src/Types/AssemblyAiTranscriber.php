<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * Configuration for transcribing speech during assistant conversations with AssemblyAI, including language, streaming model, endpointing, vocabulary, and fallback settings.
 */
class AssemblyAiTranscriber extends JsonSerializableType
{
    /**
     * @var ?value-of<AssemblyAiTranscriberLanguage> $language This is the language that will be set for the transcription.
     */
    #[JsonProperty('language')]
    public ?string $language;

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
     * This enables formatting of transcripts.
     *
     * @default true
     *
     * @var ?bool $formatTurns
     */
    #[JsonProperty('formatTurns')]
    public ?bool $formatTurns;

    /**
     * This is the end of turn confidence threshold. The minimum confidence that the end of turn is detected.
     * Note: Only used if startSpeakingPlan.smartEndpointingPlan is not set.
     * @min 0
     * @max 1
     * @default 0.7
     *
     * @var ?float $endOfTurnConfidenceThreshold
     */
    #[JsonProperty('endOfTurnConfidenceThreshold')]
    public ?float $endOfTurnConfidenceThreshold;

    /**
     * This is the minimum end of turn silence when confident in milliseconds.
     * Note: Only used if startSpeakingPlan.smartEndpointingPlan is not set.
     * @default 160
     *
     * @var ?float $minEndOfTurnSilenceWhenConfident
     */
    #[JsonProperty('minEndOfTurnSilenceWhenConfident')]
    public ?float $minEndOfTurnSilenceWhenConfident;

    /**
     * @var ?float $wordFinalizationMaxWaitTime
     */
    #[JsonProperty('wordFinalizationMaxWaitTime')]
    public ?float $wordFinalizationMaxWaitTime;

    /**
     * This is the maximum turn silence time in milliseconds.
     * Note: Only used if startSpeakingPlan.smartEndpointingPlan is not set.
     * @default 400
     *
     * @var ?float $maxTurnSilence
     */
    #[JsonProperty('maxTurnSilence')]
    public ?float $maxTurnSilence;

    /**
     * Use VAD to assist with endpointing decisions from the transcriber.
     * When enabled, transcriber endpointing will be buffered if VAD detects the user is still speaking, preventing premature turn-taking.
     * When disabled, transcriber endpointing will be used immediately regardless of VAD state, allowing for quicker but more aggressive turn-taking.
     * Note: Only used if startSpeakingPlan.smartEndpointingPlan is not set.
     *
     * @default true
     *
     * @var ?bool $vadAssistedEndpointingEnabled
     */
    #[JsonProperty('vadAssistedEndpointingEnabled')]
    public ?bool $vadAssistedEndpointingEnabled;

    /**
     * This is the transcription mode used by the Universal Pro speech models. Only applies to `universal-3-5-pro` and `universal-3-6-pro`.
     *
     * @default 'balanced'
     *
     * @var ?value-of<AssemblyAiTranscriberMode> $mode
     */
    #[JsonProperty('mode')]
    public ?string $mode;

    /**
     * @var ?string $prompt This is a prompt that provides additional context to the transcription model. Only applies to `universal-3-5-pro` and `universal-3-6-pro`.
     */
    #[JsonProperty('prompt')]
    public ?string $prompt;

    /**
     * @var ?string $agentContext This is context about the voice agent that guides the transcription model. Only applies to `universal-3-5-pro` and `universal-3-6-pro`.
     */
    #[JsonProperty('agentContext')]
    public ?string $agentContext;

    /**
     * When true, the text the assistant just spoke is sent to AssemblyAI as `agent_context` after every assistant turn, replacing the previous value, so the user's reply is transcribed in the context of the question it answers.
     * `agentContext` still seeds the first turn. Text longer than 1750 characters keeps its last 1750 characters. Turns the user interrupted are not sent when the interruption is detected by voice activity (the default, `stopSpeakingPlan.numWords: 0`).
     * Only applies to `universal-3-5-pro` and `universal-3-6-pro`.
     *
     * @default false
     *
     * @var ?bool $agentContextAutoUpdateEnabled
     */
    #[JsonProperty('agentContextAutoUpdateEnabled')]
    public ?bool $agentContextAutoUpdateEnabled;

    /**
     * These are language codes used to steer automatic language detection. Only applies to `universal-3-5-pro` and `universal-3-6-pro`.
     * `ur`, `ru`, `ko`, `ca`, `gl`, `ro`, `et`, `fa`, `yue`, `af`, `mr`, `zu`, `xh` and `nn` were added with `universal-3-6-pro`.
     *
     * @var ?array<value-of<AssemblyAiTranscriberLanguageCodesItem>> $languageCodes
     */
    #[JsonProperty('languageCodes'), ArrayType(['string'])]
    public ?array $languageCodes;

    /**
     * This is the speech model used for the streaming session.
     * Keyterms prompting is supported on universal-streaming-english, universal-3-5-pro and universal-3-6-pro.
     * universal-3-6-pro is AssemblyAI's newest and most accurate voice-agent model.
     * @default 'universal-streaming-english'
     *
     * @var ?value-of<AssemblyAiTranscriberSpeechModel> $speechModel
     */
    #[JsonProperty('speechModel')]
    public ?string $speechModel;

    /**
     * @var ?string $realtimeUrl The WebSocket URL that the transcriber connects to.
     */
    #[JsonProperty('realtimeUrl')]
    public ?string $realtimeUrl;

    /**
     * @var ?array<string> $wordBoost Add up to 2500 characters of custom vocabulary.
     */
    #[JsonProperty('wordBoost'), ArrayType(['string'])]
    public ?array $wordBoost;

    /**
     * Keyterms prompting improves recognition accuracy for specific words and phrases.
     * Can include up to 100 keyterms, each up to 50 characters.
     * Costs an additional $0.04/hour on universal-streaming-english and is included at no extra cost on the Universal Pro models (universal-3-5-pro, universal-3-6-pro).
     *
     * @var ?array<string> $keytermsPrompt
     */
    #[JsonProperty('keytermsPrompt'), ArrayType(['string'])]
    public ?array $keytermsPrompt;

    /**
     * @var ?float $endUtteranceSilenceThreshold The duration of the end utterance silence threshold in milliseconds.
     */
    #[JsonProperty('endUtteranceSilenceThreshold')]
    public ?float $endUtteranceSilenceThreshold;

    /**
     * Disable partial transcripts.
     * Set to `true` to not receive partial transcripts. Defaults to `false`.
     *
     * @var ?bool $disablePartialTranscripts
     */
    #[JsonProperty('disablePartialTranscripts')]
    public ?bool $disablePartialTranscripts;

    /**
     * @var ?FallbackTranscriberPlan $fallbackPlan This is the plan for transcriber provider fallbacks in the event that the primary transcriber provider fails.
     */
    #[JsonProperty('fallbackPlan')]
    public ?FallbackTranscriberPlan $fallbackPlan;

    /**
     * @param array{
     *   language?: ?value-of<AssemblyAiTranscriberLanguage>,
     *   confidenceThreshold?: ?float,
     *   formatTurns?: ?bool,
     *   endOfTurnConfidenceThreshold?: ?float,
     *   minEndOfTurnSilenceWhenConfident?: ?float,
     *   wordFinalizationMaxWaitTime?: ?float,
     *   maxTurnSilence?: ?float,
     *   vadAssistedEndpointingEnabled?: ?bool,
     *   mode?: ?value-of<AssemblyAiTranscriberMode>,
     *   prompt?: ?string,
     *   agentContext?: ?string,
     *   agentContextAutoUpdateEnabled?: ?bool,
     *   languageCodes?: ?array<value-of<AssemblyAiTranscriberLanguageCodesItem>>,
     *   speechModel?: ?value-of<AssemblyAiTranscriberSpeechModel>,
     *   realtimeUrl?: ?string,
     *   wordBoost?: ?array<string>,
     *   keytermsPrompt?: ?array<string>,
     *   endUtteranceSilenceThreshold?: ?float,
     *   disablePartialTranscripts?: ?bool,
     *   fallbackPlan?: ?FallbackTranscriberPlan,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->language = $values['language'] ?? null;
        $this->confidenceThreshold = $values['confidenceThreshold'] ?? null;
        $this->formatTurns = $values['formatTurns'] ?? null;
        $this->endOfTurnConfidenceThreshold = $values['endOfTurnConfidenceThreshold'] ?? null;
        $this->minEndOfTurnSilenceWhenConfident = $values['minEndOfTurnSilenceWhenConfident'] ?? null;
        $this->wordFinalizationMaxWaitTime = $values['wordFinalizationMaxWaitTime'] ?? null;
        $this->maxTurnSilence = $values['maxTurnSilence'] ?? null;
        $this->vadAssistedEndpointingEnabled = $values['vadAssistedEndpointingEnabled'] ?? null;
        $this->mode = $values['mode'] ?? null;
        $this->prompt = $values['prompt'] ?? null;
        $this->agentContext = $values['agentContext'] ?? null;
        $this->agentContextAutoUpdateEnabled = $values['agentContextAutoUpdateEnabled'] ?? null;
        $this->languageCodes = $values['languageCodes'] ?? null;
        $this->speechModel = $values['speechModel'] ?? null;
        $this->realtimeUrl = $values['realtimeUrl'] ?? null;
        $this->wordBoost = $values['wordBoost'] ?? null;
        $this->keytermsPrompt = $values['keytermsPrompt'] ?? null;
        $this->endUtteranceSilenceThreshold = $values['endUtteranceSilenceThreshold'] ?? null;
        $this->disablePartialTranscripts = $values['disablePartialTranscripts'] ?? null;
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
