<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class VapiWebsocketTransport extends JsonSerializableType
{
    /**
     * @var ?value-of<VapiWebsocketTransportConversationType> $conversationType This is the conversation type of the call (ie, voice or chat).
     */
    #[JsonProperty('conversationType')]
    public ?string $conversationType;

    /**
     * @var ?AudioFormat $audioFormat This is the audio format of the call. Defaults to 16KHz raw pcm_s16le
     */
    #[JsonProperty('audioFormat')]
    public ?AudioFormat $audioFormat;

    /**
     * @param array{
     *   conversationType?: ?value-of<VapiWebsocketTransportConversationType>,
     *   audioFormat?: ?AudioFormat,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conversationType = $values['conversationType'] ?? null;
        $this->audioFormat = $values['audioFormat'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
