<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ClientInboundMessageControl extends JsonSerializableType
{
    /**
     * @var value-of<ClientInboundMessageControlControl> $control This is the control action
     */
    #[JsonProperty('control')]
    public string $control;

    /**
     * @param array{
     *   control: value-of<ClientInboundMessageControlControl>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->control = $values['control'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
