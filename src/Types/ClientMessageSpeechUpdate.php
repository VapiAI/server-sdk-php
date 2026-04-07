<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ClientMessageSpeechUpdate extends JsonSerializableType
{
    /**
     * @var ?ClientMessageSpeechUpdatePhoneNumber $phoneNumber This is the phone number that the message is associated with.
     */
    #[JsonProperty('phoneNumber')]
    public ?ClientMessageSpeechUpdatePhoneNumber $phoneNumber;

    /**
     * @var value-of<ClientMessageSpeechUpdateType> $type This is the type of the message. "speech-update" is sent whenever assistant or user start or stop speaking.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var value-of<ClientMessageSpeechUpdateStatus> $status This is the status of the speech update.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var value-of<ClientMessageSpeechUpdateRole> $role This is the role which the speech update is for.
     */
    #[JsonProperty('role')]
    public string $role;

    /**
     * @var ?float $turn This is the turn number of the speech update (0-indexed).
     */
    #[JsonProperty('turn')]
    public ?float $turn;

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
     *   type: value-of<ClientMessageSpeechUpdateType>,
     *   status: value-of<ClientMessageSpeechUpdateStatus>,
     *   role: value-of<ClientMessageSpeechUpdateRole>,
     *   phoneNumber?: ?ClientMessageSpeechUpdatePhoneNumber,
     *   turn?: ?float,
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
        $this->status = $values['status'];
        $this->role = $values['role'];
        $this->turn = $values['turn'] ?? null;
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
