<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TwilioSmsChatTransport extends JsonSerializableType
{
    /**
     * @var ?value-of<TwilioSmsChatTransportConversationType> $conversationType This is the conversation type of the call (ie, voice or chat).
     */
    #[JsonProperty('conversationType')]
    public ?string $conversationType;

    /**
     * This is the phone number that will be used to send the SMS.
     * If provided, will create a new session. If not provided, uses existing session's phoneNumberId.
     * The phone number must have SMS enabled and belong to your organization.
     *
     * @var ?string $phoneNumberId
     */
    #[JsonProperty('phoneNumberId')]
    public ?string $phoneNumberId;

    /**
     * This is the customer who will receive the SMS.
     * If provided, will create a new session. If not provided, uses existing session's customer.
     *
     * @var ?CreateCustomerDto $customer
     */
    #[JsonProperty('customer')]
    public ?CreateCustomerDto $customer;

    /**
     * @var ?string $customerId This is the customerId of the customer who will receive the SMS.
     */
    #[JsonProperty('customerId')]
    public ?string $customerId;

    /**
     * Whether to use LLM-generated messages for outbound SMS.
     * When true (default), input is processed by the assistant for a response.
     * When false, the input text is forwarded directly as the SMS message without LLM processing.
     * Useful for sending pre-defined messages or notifications.
     *
     * @var ?bool $useLlmGeneratedMessageForOutbound
     */
    #[JsonProperty('useLLMGeneratedMessageForOutbound')]
    public ?bool $useLlmGeneratedMessageForOutbound;

    /**
     * The type of transport to use for sending the chat response.
     * Currently supports 'twilio.sms' for SMS delivery via Twilio.
     *
     * @var value-of<TwilioSmsChatTransportType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   type: value-of<TwilioSmsChatTransportType>,
     *   conversationType?: ?value-of<TwilioSmsChatTransportConversationType>,
     *   phoneNumberId?: ?string,
     *   customer?: ?CreateCustomerDto,
     *   customerId?: ?string,
     *   useLlmGeneratedMessageForOutbound?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conversationType = $values['conversationType'] ?? null;
        $this->phoneNumberId = $values['phoneNumberId'] ?? null;
        $this->customer = $values['customer'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->useLlmGeneratedMessageForOutbound = $values['useLlmGeneratedMessageForOutbound'] ?? null;
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
