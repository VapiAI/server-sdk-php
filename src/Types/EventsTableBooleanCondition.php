<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class EventsTableBooleanCondition extends JsonSerializableType
{
    /**
     * @var string $column The boolean field name from the event data
     */
    #[JsonProperty('column')]
    public string $column;

    /**
     * @var value-of<EventsTableBooleanConditionOperator> $operator Boolean comparison operator
     */
    #[JsonProperty('operator')]
    public string $operator;

    /**
     * @var bool $value The boolean value to compare
     */
    #[JsonProperty('value')]
    public bool $value;

    /**
     * @param array{
     *   column: string,
     *   operator: value-of<EventsTableBooleanConditionOperator>,
     *   value: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->column = $values['column'];
        $this->operator = $values['operator'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
