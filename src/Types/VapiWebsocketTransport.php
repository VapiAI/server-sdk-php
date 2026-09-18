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
     * This is the audio format of the call. Defaults to 16KHz raw pcm_s16le.
     *
     * For GPT-Live calls using Vapi's custom WebSocket transport, explicitly set
     * `{ format: pcm_s16le, sampleRate: 24000 }`. This requirement is specific
     * to Vapi's WebSocket transport and does not apply to phone or web calls.
     *
     * @var ?AudioFormat $audioFormat
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
