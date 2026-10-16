<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class VapiSipTransport extends JsonSerializableType
{
    /**
     * @var ?value-of<VapiSipTransportConversationType> $conversationType This is the conversation type of the call (ie, voice or chat).
     */
    #[JsonProperty('conversationType')]
    public ?string $conversationType;

    /**
     * This sets the timeout for outbound dial operations in seconds. This is the duration the call will ring before timing out.
     *
     * @default 60
     *
     * @var ?float $dialTimeout
     */
    #[JsonProperty('dialTimeout')]
    public ?float $dialTimeout;

    /**
     * @var ?string $sbcCallSid This is the call SID of the Vapi SIP call.
     */
    #[JsonProperty('sbcCallSid')]
    public ?string $sbcCallSid;

    /**
     * @var ?string $callSid This is the call ID of the Vapi SIP call.
     */
    #[JsonProperty('callSid')]
    public ?string $callSid;

    /**
     * @param array{
     *   conversationType?: ?value-of<VapiSipTransportConversationType>,
     *   dialTimeout?: ?float,
     *   sbcCallSid?: ?string,
     *   callSid?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conversationType = $values['conversationType'] ?? null;
        $this->dialTimeout = $values['dialTimeout'] ?? null;
        $this->sbcCallSid = $values['sbcCallSid'] ?? null;
        $this->callSid = $values['callSid'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
