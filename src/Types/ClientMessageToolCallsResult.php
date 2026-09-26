<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class ClientMessageToolCallsResult extends JsonSerializableType
{
    /**
     * @var ?ClientMessageToolCallsResultPhoneNumber $phoneNumber This is the phone number that the message is associated with.
     */
    #[JsonProperty('phoneNumber')]
    public ?ClientMessageToolCallsResultPhoneNumber $phoneNumber;

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
     * @var value-of<ClientMessageToolCallsResultType> $type This is the type of the message. "tool-calls-result" is sent to forward the result of a tool call to the client.
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
     * @var array<string, mixed> $toolCallResult This is the result of the tool call.
     */
    #[JsonProperty('toolCallResult'), ArrayType(['string' => 'mixed'])]
    public array $toolCallResult;

    /**
     * @param array{
     *   type: value-of<ClientMessageToolCallsResultType>,
     *   toolCallResult: array<string, mixed>,
     *   phoneNumber?: ?ClientMessageToolCallsResultPhoneNumber,
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
        $this->toolCallResult = $values['toolCallResult'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
