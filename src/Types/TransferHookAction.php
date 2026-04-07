<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TransferHookAction extends JsonSerializableType
{
    /**
     * @var value-of<TransferHookActionType> $type This is the type of action - must be "transfer"
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?TransferHookActionDestination $destination This is the destination details for the transfer - can be a phone number or SIP URI
     */
    #[JsonProperty('destination')]
    public ?TransferHookActionDestination $destination;

    /**
     * @param array{
     *   type: value-of<TransferHookActionType>,
     *   destination?: ?TransferHookActionDestination,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
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
