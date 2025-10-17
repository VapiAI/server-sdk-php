<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;

class SecurityFilterBase extends JsonSerializableType
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
