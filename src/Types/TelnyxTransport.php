<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TelnyxTransport extends JsonSerializableType
{
    /**
     * @var ?value-of<TelnyxTransportConversationType> $conversationType This is the conversation type of the call (ie, voice or chat).
     */
    #[JsonProperty('conversationType')]
    public ?string $conversationType;

    /**
     * @var ?string $callControlId This is the call control ID of the Telnyx call.
     */
    #[JsonProperty('callControlId')]
    public ?string $callControlId;

    /**
     * @var ?string $callLegId This is the call leg ID of the Telnyx call.
     */
    #[JsonProperty('callLegId')]
    public ?string $callLegId;

    /**
     * @var ?string $callSessionId This is the call session ID of the Telnyx call.
     */
    #[JsonProperty('callSessionId')]
    public ?string $callSessionId;

    /**
     * @param array{
     *   conversationType?: ?value-of<TelnyxTransportConversationType>,
     *   callControlId?: ?string,
     *   callLegId?: ?string,
     *   callSessionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conversationType = $values['conversationType'] ?? null;
        $this->callControlId = $values['callControlId'] ?? null;
        $this->callLegId = $values['callLegId'] ?? null;
        $this->callSessionId = $values['callSessionId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
