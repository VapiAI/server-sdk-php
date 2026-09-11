<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class VonageTransport extends JsonSerializableType
{
    /**
     * @var ?value-of<VonageTransportConversationType> $conversationType This is the conversation type of the call (ie, voice or chat).
     */
    #[JsonProperty('conversationType')]
    public ?string $conversationType;

    /**
     * @var ?string $conversationUuid This is the conversation UUID of the Vonage call.
     */
    #[JsonProperty('conversationUUID')]
    public ?string $conversationUuid;

    /**
     * @var ?string $callUuid This is the call ID of the Vonage call.
     */
    #[JsonProperty('callUUID')]
    public ?string $callUuid;

    /**
     * @param array{
     *   conversationType?: ?value-of<VonageTransportConversationType>,
     *   conversationUuid?: ?string,
     *   callUuid?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conversationType = $values['conversationType'] ?? null;
        $this->conversationUuid = $values['conversationUuid'] ?? null;
        $this->callUuid = $values['callUuid'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
