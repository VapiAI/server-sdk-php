<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TransferPhoneNumberHookAction extends JsonSerializableType
{
    /**
     * @var ?TransferPhoneNumberHookActionDestination $destination This is the destination details for the transfer - can be a phone number or SIP URI
     */
    #[JsonProperty('destination')]
    public ?TransferPhoneNumberHookActionDestination $destination;

    /**
     * @param array{
     *   destination?: ?TransferPhoneNumberHookActionDestination,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->destination = $values['destination'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
