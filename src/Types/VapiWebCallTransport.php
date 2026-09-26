<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class VapiWebCallTransport extends JsonSerializableType
{
    /**
     * @var ?value-of<VapiWebCallTransportConversationType> $conversationType This is the conversation type of the call (ie, voice or chat).
     */
    #[JsonProperty('conversationType')]
    public ?string $conversationType;

    /**
     * This determines whether the daily room will be deleted and all participants will be kicked once the user leaves the room.
     * If set to `false`, the room will be kept alive even after the user leaves, allowing clients to reconnect to the same room.
     * If set to `true`, the room will be deleted and reconnection will not be allowed.
     *
     * Defaults to `true`.
     *
     * @var ?bool $roomDeleteOnUserLeaveEnabled
     */
    #[JsonProperty('roomDeleteOnUserLeaveEnabled')]
    public ?bool $roomDeleteOnUserLeaveEnabled;

    /**
     * This is the meeting token the web client should join the call with.
     * When video recording is enabled, joining with this token starts the cloud
     * recording automatically server-side, which is more reliable than the
     * client starting it after joining. Set by the server; only present when
     * video recording is enabled.
     *
     * @var ?string $callToken
     */
    #[JsonProperty('callToken')]
    public ?string $callToken;

    /**
     * @var ?string $callUrl This is the URL of the web call.
     */
    #[JsonProperty('callUrl')]
    public ?string $callUrl;

    /**
     * @var ?string $callSipUri This is the SIP URI of the web call.
     */
    #[JsonProperty('callSipUri')]
    public ?string $callSipUri;

    /**
     * @param array{
     *   conversationType?: ?value-of<VapiWebCallTransportConversationType>,
     *   roomDeleteOnUserLeaveEnabled?: ?bool,
     *   callToken?: ?string,
     *   callUrl?: ?string,
     *   callSipUri?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conversationType = $values['conversationType'] ?? null;
        $this->roomDeleteOnUserLeaveEnabled = $values['roomDeleteOnUserLeaveEnabled'] ?? null;
        $this->callToken = $values['callToken'] ?? null;
        $this->callUrl = $values['callUrl'] ?? null;
        $this->callSipUri = $values['callSipUri'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
