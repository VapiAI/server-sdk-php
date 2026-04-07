<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class FilterNumberTypeColumnOnCallTable extends JsonSerializableType
{
    /**
     * This is the column in the call table that will be filtered on.
     * Number Type columns are columns where the rows store data as a number.
     * Must be a valid column for the selected table.
     *
     * @var value-of<FilterNumberTypeColumnOnCallTableColumn> $column
     */
    #[JsonProperty('column')]
    public string $column;

    /**
     * This is the operator to use for the filter.
     * For number type columns, the operator must be "=", ">", "<", ">=", "<="
     *
     * @var value-of<FilterNumberTypeColumnOnCallTableOperator> $operator
     */
    #[JsonProperty('operator')]
    public string $operator;

    /**
     * @var float $value This is the value to filter on.
     */
    #[JsonProperty('value')]
    public float $value;

    /**
     * @param array{
     *   column: value-of<FilterNumberTypeColumnOnCallTableColumn>,
     *   operator: value-of<FilterNumberTypeColumnOnCallTableOperator>,
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
