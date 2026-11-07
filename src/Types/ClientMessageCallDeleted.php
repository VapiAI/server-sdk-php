<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ClientMessageCallDeleted extends JsonSerializableType
{
    /**
     * @var ?ClientMessageCallDeletedPhoneNumber $phoneNumber This is the phone number that the message is associated with.
     */
    #[JsonProperty('phoneNumber')]
    public ?ClientMessageCallDeletedPhoneNumber $phoneNumber;

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
     * @var value-of<ClientMessageCallDeletedType> $type This is the type of the message. "call.deleted" is sent when a call is deleted.
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
     * @param array{
     *   type: value-of<ClientMessageCallDeletedType>,
     *   phoneNumber?: ?ClientMessageCallDeletedPhoneNumber,
     *   assistantVersion?: ?string,
     *   timestamp?: ?float,
     *   call?: ?Call,
     *   customer?: ?CreateCustomerDto,
     *   assistant?: ?CreateAssistantDto,
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
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
