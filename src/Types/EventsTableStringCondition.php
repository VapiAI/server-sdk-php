<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class EventsTableStringCondition extends JsonSerializableType
{
    /**
     * @var string $column The string field name from the event data
     */
    #[JsonProperty('column')]
    public string $column;

    /**
     * @var value-of<EventsTableStringConditionOperator> $operator String comparison operator
     */
    #[JsonProperty('operator')]
    public string $operator;

    /**
     * @var string $value The string value to compare
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   column: string,
     *   operator: value-of<EventsTableStringConditionOperator>,
     *   value: string,
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
