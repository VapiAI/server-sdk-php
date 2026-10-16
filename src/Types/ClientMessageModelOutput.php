<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class ClientMessageModelOutput extends JsonSerializableType
{
    /**
     * @var ?ClientMessageModelOutputPhoneNumber $phoneNumber This is the phone number that the message is associated with.
     */
    #[JsonProperty('phoneNumber')]
    public ?ClientMessageModelOutputPhoneNumber $phoneNumber;

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
     * @var value-of<ClientMessageModelOutputType> $type This is the type of the message. "model-output" is sent as the model outputs tokens.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * This is the unique identifier for the current LLM turn. All tokens from the same
     * LLM response share the same turnId. Use this to group tokens and discard on interruption.
     *
     * @var ?string $turnId
     */
    #[JsonProperty('turnId')]
    public ?string $turnId;

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
     * @var array<string, mixed> $output This is the output of the model. It can be a token or tool call.
     */
    #[JsonProperty('output'), ArrayType(['string' => 'mixed'])]
    public array $output;

    /**
     * @param array{
     *   type: value-of<ClientMessageModelOutputType>,
     *   output: array<string, mixed>,
     *   phoneNumber?: ?ClientMessageModelOutputPhoneNumber,
     *   assistantVersion?: ?string,
     *   turnId?: ?string,
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
        $this->turnId = $values['turnId'] ?? null;
        $this->timestamp = $values['timestamp'] ?? null;
        $this->call = $values['call'] ?? null;
        $this->customer = $values['customer'] ?? null;
        $this->assistant = $values['assistant'] ?? null;
        $this->output = $values['output'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
