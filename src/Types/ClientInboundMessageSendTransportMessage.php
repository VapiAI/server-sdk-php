<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ClientInboundMessageSendTransportMessage extends JsonSerializableType
{
    /**
     * @var ClientInboundMessageSendTransportMessageMessage $message This is the transport-specific message to send.
     */
    #[JsonProperty('message')]
    public ClientInboundMessageSendTransportMessageMessage $message;

    /**
     * @param array{
     *   message: ClientInboundMessageSendTransportMessageMessage,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->message = $values['message'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
