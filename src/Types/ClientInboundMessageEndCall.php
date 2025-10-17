<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;

class ClientInboundMessageEndCall extends JsonSerializableType
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
