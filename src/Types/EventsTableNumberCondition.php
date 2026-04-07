<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class EventsTableNumberCondition extends JsonSerializableType
{
    /**
     * @var string $column The number field name from the event data
     */
    #[JsonProperty('column')]
    public string $column;

    /**
     * @var value-of<EventsTableNumberConditionOperator> $operator Number comparison operator
     */
    #[JsonProperty('operator')]
    public string $operator;

    /**
     * @var float $value The number value to compare
     */
    #[JsonProperty('value')]
    public float $value;

    /**
     * @param array{
     *   column: string,
     *   operator: value-of<EventsTableNumberConditionOperator>,
     *   value: float,
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
