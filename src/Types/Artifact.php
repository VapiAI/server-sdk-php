<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use Vapi\Core\Types\Union;
use DateTime;
use Vapi\Core\Types\Date;

class Artifact extends JsonSerializableType
{
    /**
     * @var ?array<(
     *    UserMessage
     *   |SystemMessage
     *   |BotMessage
     *   |ToolCallMessage
     *   |ToolCallResultMessage
     * )> $messages These are the messages that were spoken during the call.
     */
    #[JsonProperty('messages'), ArrayType([new Union(UserMessage::class, SystemMessage::class, BotMessage::class, ToolCallMessage::class, ToolCallResultMessage::class)])]
    public ?array $messages;

    /**
     * @var ?array<OpenAiMessage> $messagesOpenAiFormatted These are the messages that were spoken during the call, formatted for OpenAI.
     */
    #[JsonProperty('messagesOpenAIFormatted'), ArrayType([OpenAiMessage::class])]
    public ?array $messagesOpenAiFormatted;

    /**
     * @var ?string $recordingUrl This is the recording url for the call. To enable, set `assistant.artifactPlan.recordingEnabled`.
     */
    #[JsonProperty('recordingUrl')]
    public ?string $recordingUrl;

    /**
     * @var ?string $stereoRecordingUrl This is the stereo recording url for the call. To enable, set `assistant.artifactPlan.recordingEnabled`.
     */
    #[JsonProperty('stereoRecordingUrl')]
    public ?string $stereoRecordingUrl;

    /**
     * @var ?string $videoRecordingUrl This is video recording url for the call. To enable, set `assistant.artifactPlan.videoRecordingEnabled`.
     */
    #[JsonProperty('videoRecordingUrl')]
    public ?string $videoRecordingUrl;

    /**
     * @var ?float $videoRecordingStartDelaySeconds This is video recording start delay in ms. To enable, set `assistant.artifactPlan.videoRecordingEnabled`. This can be used to align the playback of the recording with artifact.messages timestamps.
     */
    #[JsonProperty('videoRecordingStartDelaySeconds')]
    public ?float $videoRecordingStartDelaySeconds;

    /**
     * @var ?Recording $recording This is the recording url for the call. To enable, set `assistant.artifactPlan.recordingEnabled`.
     */
    #[JsonProperty('recording')]
    public ?Recording $recording;

    /**
     * @var ?string $transcript This is the transcript of the call. This is derived from `artifact.messages` but provided for convenience.
     */
    #[JsonProperty('transcript')]
    public ?string $transcript;

    /**
     * @var ?string $pcapUrl This is the packet capture url for the call. This is only available for `phone` type calls where phone number's provider is `vapi` or `byo-phone-number`.
     */
    #[JsonProperty('pcapUrl')]
    public ?string $pcapUrl;

    /**
     * @var ?string $logUrl This is the url for the call logs. This includes all logging output during the call for debugging purposes.
     */
    #[JsonProperty('logUrl')]
    public ?string $logUrl;

    /**
     * @var ?array<NodeArtifact> $nodes This is the history of workflow nodes that were executed during the call.
     */
    #[JsonProperty('nodes'), ArrayType([NodeArtifact::class])]
    public ?array $nodes;

    /**
     * @var ?array<AssistantActivation> $assistantActivations Ordered list of assistants that were active during the call, including after transfers and handoffs.
     */
    #[JsonProperty('assistantActivations'), ArrayType([AssistantActivation::class])]
    public ?array $assistantActivations;

    /**
     * @var ?array<string, mixed> $variableValues These are the variable values at the end of the workflow execution.
     */
    #[JsonProperty('variableValues'), ArrayType(['string' => 'mixed'])]
    public ?array $variableValues;

    /**
     * @var ?PerformanceMetrics $performanceMetrics This is the performance metrics for the call. It contains the turn latency, broken down by component.
     */
    #[JsonProperty('performanceMetrics')]
    public ?PerformanceMetrics $performanceMetrics;

    /**
     * These are the structured outputs that will be extracted from the call.
     * To enable, set `assistant.artifactPlan.structuredOutputIds` with the IDs of the structured outputs you want to extract.
     *
     * @var ?array<string, mixed> $structuredOutputs
     */
    #[JsonProperty('structuredOutputs'), ArrayType(['string' => 'mixed'])]
    public ?array $structuredOutputs;

    /**
     * These are the scorecards that have been evaluated based on the structured outputs extracted during the call.
     * To enable, set `assistant.artifactPlan.scorecardIds` or `assistant.artifactPlan.scorecards` with the IDs or objects of the scorecards you want to evaluate.
     *
     * @var ?array<string, mixed> $scorecards
     */
    #[JsonProperty('scorecards'), ArrayType(['string' => 'mixed'])]
    public ?array $scorecards;

    /**
     * @var ?array<string> $transfers These are the transfer records from warm transfers, including destinations, transcripts, and status.
     */
    #[JsonProperty('transfers'), ArrayType(['string'])]
    public ?array $transfers;

    /**
     * @var ?DateTime $structuredOutputsLastUpdatedAt This is when the structured outputs were last updated
     */
    #[JsonProperty('structuredOutputsLastUpdatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $structuredOutputsLastUpdatedAt;

    /**
     * @param array{
     *   messages?: ?array<(
     *    UserMessage
     *   |SystemMessage
     *   |BotMessage
     *   |ToolCallMessage
     *   |ToolCallResultMessage
     * )>,
     *   messagesOpenAiFormatted?: ?array<OpenAiMessage>,
     *   recordingUrl?: ?string,
     *   stereoRecordingUrl?: ?string,
     *   videoRecordingUrl?: ?string,
     *   videoRecordingStartDelaySeconds?: ?float,
     *   recording?: ?Recording,
     *   transcript?: ?string,
     *   pcapUrl?: ?string,
     *   logUrl?: ?string,
     *   nodes?: ?array<NodeArtifact>,
     *   assistantActivations?: ?array<AssistantActivation>,
     *   variableValues?: ?array<string, mixed>,
     *   performanceMetrics?: ?PerformanceMetrics,
     *   structuredOutputs?: ?array<string, mixed>,
     *   scorecards?: ?array<string, mixed>,
     *   transfers?: ?array<string>,
     *   structuredOutputsLastUpdatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->messages = $values['messages'] ?? null;
        $this->messagesOpenAiFormatted = $values['messagesOpenAiFormatted'] ?? null;
        $this->recordingUrl = $values['recordingUrl'] ?? null;
        $this->stereoRecordingUrl = $values['stereoRecordingUrl'] ?? null;
        $this->videoRecordingUrl = $values['videoRecordingUrl'] ?? null;
        $this->videoRecordingStartDelaySeconds = $values['videoRecordingStartDelaySeconds'] ?? null;
        $this->recording = $values['recording'] ?? null;
        $this->transcript = $values['transcript'] ?? null;
        $this->pcapUrl = $values['pcapUrl'] ?? null;
        $this->logUrl = $values['logUrl'] ?? null;
        $this->nodes = $values['nodes'] ?? null;
        $this->assistantActivations = $values['assistantActivations'] ?? null;
        $this->variableValues = $values['variableValues'] ?? null;
        $this->performanceMetrics = $values['performanceMetrics'] ?? null;
        $this->structuredOutputs = $values['structuredOutputs'] ?? null;
        $this->scorecards = $values['scorecards'] ?? null;
        $this->transfers = $values['transfers'] ?? null;
        $this->structuredOutputsLastUpdatedAt = $values['structuredOutputsLastUpdatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
