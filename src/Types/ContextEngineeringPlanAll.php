<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;

/**
 * Includes all available messages when constructing context for a handoff.
 */
class ContextEngineeringPlanAll extends JsonSerializableType
{
    /**
     * @param array{
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        unset($values);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
