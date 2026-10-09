<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class ServerMessageTranscript extends JsonSerializableType
{
    /**
     * @var ?ServerMessageTranscriptPhoneNumber $phoneNumber This is the phone number that the message is associated with.
     */
    #[JsonProperty('phoneNumber')]
    public ?ServerMessageTranscriptPhoneNumber $phoneNumber;

    /**
     * This is the version label (e.g. `v3`) of the assistant the call was
     * configured with. `null` for inline assistants, squad/workflow calls,
     * pre-resolution assistant-request messages, and orgs not on
     * assistant versioning.
     *
     * @var ?string $assistantVersion
     */
    #[JsonProperty('assistantVersion')]
    public ?string $assistantVersion;

    /**
     * @var value-of<ServerMessageTranscriptType> $type This is the type of the message. "transcript" is sent as transcriber outputs partial or final transcript.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?float $timestamp This is the timestamp of the message.
     */
    #[JsonProperty('timestamp')]
    public ?float $timestamp;

    /**
     * This is a live version of the `call.artifact`.
     *
     * This matches what is stored on `call.artifact` after the call.
     *
     * @var ?Artifact $artifact
     */
    #[JsonProperty('artifact')]
    public ?Artifact $artifact;

    /**
     * @var ?CreateAssistantDto $assistant This is the assistant that the message is associated with.
     */
    #[JsonProperty('assistant')]
    public ?CreateAssistantDto $assistant;

    /**
     * @var ?CreateCustomerDto $customer This is the customer that the message is associated with.
     */
    #[JsonProperty('customer')]
    public ?CreateCustomerDto $customer;

    /**
     * @var ?Call $call This is the call that the message is associated with.
     */
    #[JsonProperty('call')]
    public ?Call $call;

    /**
     * @var ?Chat $chat This is the chat object.
     */
    #[JsonProperty('chat')]
    public ?Chat $chat;

    /**
     * @var value-of<ServerMessageTranscriptRole> $role This is the role for which the transcript is for.
     */
    #[JsonProperty('role')]
    public string $role;

    /**
     * @var value-of<ServerMessageTranscriptTranscriptType> $transcriptType This is the type of the transcript.
     */
    #[JsonProperty('transcriptType')]
    public string $transcriptType;

    /**
     * @var string $transcript This is the transcript content.
     */
    #[JsonProperty('transcript')]
    public string $transcript;

    /**
     * The ID of the assistant that produced this transcript. Present on
     * assistant-role events when an active assistant ID is available.
     *
     * @var ?string $assistantId
     */
    #[JsonProperty('assistantId')]
    public ?string $assistantId;

    /**
     * The name of the assistant that produced this transcript. Present on
     * assistant-role events when an active assistant name is available.
     *
     * @var ?string $assistantName
     */
    #[JsonProperty('assistantName')]
    public ?string $assistantName;

    /**
     * @var ?bool $isFiltered Indicates if the transcript was filtered for security reasons.
     */
    #[JsonProperty('isFiltered')]
    public ?bool $isFiltered;

    /**
     * @var ?array<string> $detectedThreats List of detected security threats if the transcript was filtered.
     */
    #[JsonProperty('detectedThreats'), ArrayType(['string'])]
    public ?array $detectedThreats;

    /**
     * @var ?string $originalTranscript The original transcript before filtering (only included if content was filtered).
     */
    #[JsonProperty('originalTranscript')]
    public ?string $originalTranscript;

    /**
     * The transcriber's confidence score for this transcript, in [0, 1]. Only
     * ever set alongside `confidenceSource` — see there for why an unmarked
     * score is never included. Set only on final user-role transcripts: each
     * live message carries the score of the one fragment it was built from, and
     * `artifact.messages` agrees with it per fragment. A stored message built
     * from several consecutive fragments reports the minimum across them as
     * 'derived', so it can differ from the individual live messages that fed
     * it. Partials never carry a score, because nothing stored exists for a
     * partial's score to agree with.
     *
     * @var ?float $confidence
     */
    #[JsonProperty('confidence')]
    public ?float $confidence;

    /**
     * Whether `confidence` came directly from the transcriber ('provider') or
     * was computed by Vapi ('derived').
     *
     * 'derived' means Vapi computed the score from the transcriber's per-word
     * scores; the exact aggregation is provider-specific (an average, a median
     * or a minimum, depending on the transcriber).
     *
     * Absent means no trustworthy score was available for this transcript:
     * either the transcriber does not report one, or the value it reported was
     * invalid and was dropped.
     *
     * @var ?value-of<ServerMessageTranscriptConfidenceSource> $confidenceSource
     */
    #[JsonProperty('confidenceSource')]
    public ?string $confidenceSource;

    /**
     * @param array{
     *   type: value-of<ServerMessageTranscriptType>,
     *   role: value-of<ServerMessageTranscriptRole>,
     *   transcriptType: value-of<ServerMessageTranscriptTranscriptType>,
     *   transcript: string,
     *   phoneNumber?: ?ServerMessageTranscriptPhoneNumber,
     *   assistantVersion?: ?string,
     *   timestamp?: ?float,
     *   artifact?: ?Artifact,
     *   assistant?: ?CreateAssistantDto,
     *   customer?: ?CreateCustomerDto,
     *   call?: ?Call,
     *   chat?: ?Chat,
     *   assistantId?: ?string,
     *   assistantName?: ?string,
     *   isFiltered?: ?bool,
     *   detectedThreats?: ?array<string>,
     *   originalTranscript?: ?string,
     *   confidence?: ?float,
     *   confidenceSource?: ?value-of<ServerMessageTranscriptConfidenceSource>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->phoneNumber = $values['phoneNumber'] ?? null;
        $this->assistantVersion = $values['assistantVersion'] ?? null;
        $this->type = $values['type'];
        $this->timestamp = $values['timestamp'] ?? null;
        $this->artifact = $values['artifact'] ?? null;
        $this->assistant = $values['assistant'] ?? null;
        $this->customer = $values['customer'] ?? null;
        $this->call = $values['call'] ?? null;
        $this->chat = $values['chat'] ?? null;
        $this->role = $values['role'];
        $this->transcriptType = $values['transcriptType'];
        $this->transcript = $values['transcript'];
        $this->assistantId = $values['assistantId'] ?? null;
        $this->assistantName = $values['assistantName'] ?? null;
        $this->isFiltered = $values['isFiltered'] ?? null;
        $this->detectedThreats = $values['detectedThreats'] ?? null;
        $this->originalTranscript = $values['originalTranscript'] ?? null;
        $this->confidence = $values['confidence'] ?? null;
        $this->confidenceSource = $values['confidenceSource'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
