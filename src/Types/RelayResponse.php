<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class RelayResponse extends JsonSerializableType
{
    /**
     * @var value-of<RelayResponseStatus> $status The status of the relay request
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $callId The unique identifier of the call, if delivered to a live call
     */
    #[JsonProperty('callId')]
    public ?string $callId;

    /**
     * @var ?string $sessionId The unique identifier of the session, if delivered to a headless session
     */
    #[JsonProperty('sessionId')]
    public ?string $sessionId;

    /**
     * @var ?string $chatId
     */
    #[JsonProperty('chatId')]
    public ?string $chatId;

    /**
     * @param array{
     *   status: value-of<RelayResponseStatus>,
     *   callId?: ?string,
     *   sessionId?: ?string,
     *   chatId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->status = $values['status'];
        $this->callId = $values['callId'] ?? null;
        $this->sessionId = $values['sessionId'] ?? null;
        $this->chatId = $values['chatId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
