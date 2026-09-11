<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;

/**
 * Includes only user and assistant messages when constructing context for a handoff.
 */
class ContextEngineeringPlanUserAndAssistantMessages extends JsonSerializableType
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
