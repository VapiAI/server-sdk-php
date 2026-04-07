<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class FilterDateTypeColumnOnCallTable extends JsonSerializableType
{
    /**
     * This is the column in the call table that will be filtered on.
     * Date Type columns are columns where the rows store data as a date.
     * Must be a valid column for the selected table.
     *
     * @var value-of<FilterDateTypeColumnOnCallTableColumn> $column
     */
    #[JsonProperty('column')]
    public string $column;

    /**
     * This is the operator to use for the filter.
     * For date type columns, the operator must be "=", ">", "<", ">=", "<="
     *
     * @var value-of<FilterDateTypeColumnOnCallTableOperator> $operator
     */
    #[JsonProperty('operator')]
    public string $operator;

    /**
     * This is the value to filter on.
     * Must be a valid ISO 8601 date-time string.
     *
     * @var string $value
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   column: value-of<FilterDateTypeColumnOnCallTableColumn>,
     *   operator: value-of<FilterDateTypeColumnOnCallTableOperator>,
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
