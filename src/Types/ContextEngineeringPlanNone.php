<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;

/**
 * Excludes prior conversation messages when constructing context for a handoff.
 */
class ContextEngineeringPlanNone extends JsonSerializableType
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
