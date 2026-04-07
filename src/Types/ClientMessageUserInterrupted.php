<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ClientMessageUserInterrupted extends JsonSerializableType
{
    /**
     * @var ?ClientMessageUserInterruptedPhoneNumber $phoneNumber This is the phone number that the message is associated with.
     */
    #[JsonProperty('phoneNumber')]
    public ?ClientMessageUserInterruptedPhoneNumber $phoneNumber;

    /**
     * @var value-of<ClientMessageUserInterruptedType> $type This is the type of the message. "user-interrupted" is sent when the user interrupts the assistant.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * This is the turnId of the LLM response that was interrupted. Matches the turnId
     * on model-output messages so clients can discard the interrupted turn's tokens.
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
     * @param array{
     *   type: value-of<ClientMessageUserInterruptedType>,
     *   phoneNumber?: ?ClientMessageUserInterruptedPhoneNumber,
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
        $this->type = $values['type'];
        $this->turnId = $values['turnId'] ?? null;
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
