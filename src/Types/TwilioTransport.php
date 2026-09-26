<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TwilioTransport extends JsonSerializableType
{
    /**
     * @var ?value-of<TwilioTransportConversationType> $conversationType This is the conversation type of the call (ie, voice or chat).
     */
    #[JsonProperty('conversationType')]
    public ?string $conversationType;

    /**
     * @var ?string $accountSid This is the account SID of the Twilio account.
     */
    #[JsonProperty('accountSid')]
    public ?string $accountSid;

    /**
     * @var ?string $callSid This is the call SID of the Twilio call.
     */
    #[JsonProperty('callSid')]
    public ?string $callSid;

    /**
     * @var ?string $callToken This is the call token of the Twilio call.
     */
    #[JsonProperty('callToken')]
    public ?string $callToken;

    /**
     * This is the phone number from which the call was forwarded.
     * Undefined if the call was not forwarded.
     *
     * @var ?string $forwardedFrom
     */
    #[JsonProperty('forwardedFrom')]
    public ?string $forwardedFrom;

    /**
     * @param array{
     *   conversationType?: ?value-of<TwilioTransportConversationType>,
     *   accountSid?: ?string,
     *   callSid?: ?string,
     *   callToken?: ?string,
     *   forwardedFrom?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conversationType = $values['conversationType'] ?? null;
        $this->accountSid = $values['accountSid'] ?? null;
        $this->callSid = $values['callSid'] ?? null;
        $this->callToken = $values['callToken'] ?? null;
        $this->forwardedFrom = $values['forwardedFrom'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
