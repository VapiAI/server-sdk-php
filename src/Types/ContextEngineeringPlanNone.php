<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;

class ContextEngineeringPlanNone extends JsonSerializableType
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
