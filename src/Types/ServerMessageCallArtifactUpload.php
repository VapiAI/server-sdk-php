<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class ServerMessageCallArtifactUpload extends JsonSerializableType
{
    /**
     * @var ?ServerMessageCallArtifactUploadPhoneNumber $phoneNumber This is the phone number that the message is associated with.
     */
    #[JsonProperty('phoneNumber')]
    public ?ServerMessageCallArtifactUploadPhoneNumber $phoneNumber;

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
     * This is the type of the message. "call.artifact.upload" is sent after a call
     * to report whether each artifact was stored in your own configured storage.
     *
     * @var value-of<ServerMessageCallArtifactUploadType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * One entry per artifact whose write targeted your own configured storage,
     * each reporting whether that artifact was stored successfully. Artifacts that
     * were not destined for your own storage (Vapi default storage, or no storage
     * credential configured) are omitted, and this message is sent only when at
     * least one artifact targeted your own storage.
     *
     * @var array<CallArtifactUploadItem> $artifacts
     */
    #[JsonProperty('artifacts'), ArrayType([CallArtifactUploadItem::class])]
    public array $artifacts;

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
     * @param array{
     *   type: value-of<ServerMessageCallArtifactUploadType>,
     *   artifacts: array<CallArtifactUploadItem>,
     *   phoneNumber?: ?ServerMessageCallArtifactUploadPhoneNumber,
     *   assistantVersion?: ?string,
     *   timestamp?: ?float,
     *   artifact?: ?Artifact,
     *   assistant?: ?CreateAssistantDto,
     *   customer?: ?CreateCustomerDto,
     *   call?: ?Call,
     *   chat?: ?Chat,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->phoneNumber = $values['phoneNumber'] ?? null;
        $this->assistantVersion = $values['assistantVersion'] ?? null;
        $this->type = $values['type'];
        $this->artifacts = $values['artifacts'];
        $this->timestamp = $values['timestamp'] ?? null;
        $this->artifact = $values['artifact'] ?? null;
        $this->assistant = $values['assistant'] ?? null;
        $this->customer = $values['customer'] ?? null;
        $this->call = $values['call'] ?? null;
        $this->chat = $values['chat'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
