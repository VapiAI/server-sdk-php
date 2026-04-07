<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class FilterStringTypeColumnOnCallTable extends JsonSerializableType
{
    /**
     * This is the column in the call table that will be filtered on.
     * String Type columns are columns where the rows store data as a string.
     * Must be a valid column for the selected table.
     *
     * @var value-of<FilterStringTypeColumnOnCallTableColumn> $column
     */
    #[JsonProperty('column')]
    public string $column;

    /**
     * This is the operator to use for the filter.
     * For string type columns, the operator must be "=", "!=", "contains", "not contains"
     *
     * @var value-of<FilterStringTypeColumnOnCallTableOperator> $operator
     */
    #[JsonProperty('operator')]
    public string $operator;

    /**
     * @var string $value This is the value to filter on.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   column: value-of<FilterStringTypeColumnOnCallTableColumn>,
     *   operator: value-of<FilterStringTypeColumnOnCallTableOperator>,
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
