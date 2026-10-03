<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class ClientMessageTranscript extends JsonSerializableType
{
    /**
     * @var ?ClientMessageTranscriptPhoneNumber $phoneNumber This is the phone number that the message is associated with.
     */
    #[JsonProperty('phoneNumber')]
    public ?ClientMessageTranscriptPhoneNumber $phoneNumber;

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
     * @var value-of<ClientMessageTranscriptType> $type This is the type of the message. "transcript" is sent as transcriber outputs partial or final transcript.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?float $timestamp This is the timestamp of the message.
     */
    #[JsonProperty('timestamp')]
    public ?float $timestamp;

    /**
     * @var ?Call $call This is the call that the message is associated with.
     */
    #[JsonProperty('call')]
    public ?Call $call;

    /**
     * @var ?CreateCustomerDto $customer This is the customer that the message is associated with.
     */
    #[JsonProperty('customer')]
    public ?CreateCustomerDto $customer;

    /**
     * @var ?CreateAssistantDto $assistant This is the assistant that the message is associated with.
     */
    #[JsonProperty('assistant')]
    public ?CreateAssistantDto $assistant;

    /**
     * @var value-of<ClientMessageTranscriptRole> $role This is the role for which the transcript is for.
     */
    #[JsonProperty('role')]
    public string $role;

    /**
     * @var value-of<ClientMessageTranscriptTranscriptType> $transcriptType This is the type of the transcript.
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
     * @var ?value-of<ClientMessageTranscriptConfidenceSource> $confidenceSource
     */
    #[JsonProperty('confidenceSource')]
    public ?string $confidenceSource;

    /**
     * @param array{
     *   type: value-of<ClientMessageTranscriptType>,
     *   role: value-of<ClientMessageTranscriptRole>,
     *   transcriptType: value-of<ClientMessageTranscriptTranscriptType>,
     *   transcript: string,
     *   phoneNumber?: ?ClientMessageTranscriptPhoneNumber,
     *   assistantVersion?: ?string,
     *   timestamp?: ?float,
     *   call?: ?Call,
     *   customer?: ?CreateCustomerDto,
     *   assistant?: ?CreateAssistantDto,
     *   assistantId?: ?string,
     *   assistantName?: ?string,
     *   isFiltered?: ?bool,
     *   detectedThreats?: ?array<string>,
     *   originalTranscript?: ?string,
     *   confidence?: ?float,
     *   confidenceSource?: ?value-of<ClientMessageTranscriptConfidenceSource>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->phoneNumber = $values['phoneNumber'] ?? null;
        $this->assistantVersion = $values['assistantVersion'] ?? null;
        $this->type = $values['type'];
        $this->timestamp = $values['timestamp'] ?? null;
        $this->call = $values['call'] ?? null;
        $this->customer = $values['customer'] ?? null;
        $this->assistant = $values['assistant'] ?? null;
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
