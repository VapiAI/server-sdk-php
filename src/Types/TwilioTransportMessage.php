<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TwilioTransportMessage extends JsonSerializableType
{
    /**
     * @var string $twiml This is the TwiML to send to the Twilio call.
     */
    #[JsonProperty('twiml')]
    public string $twiml;

    /**
     * @param array{
     *   twiml: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->twiml = $values['twiml'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
