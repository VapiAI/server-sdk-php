<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class FilterNumberArrayTypeColumnOnCallTable extends JsonSerializableType
{
    /**
     * This is the column in the call table that will be filtered on.
     * Number Array Type columns are the same as Number Type columns, but provides the ability to filter on multiple values provided as an array.
     * Must be a valid column for the selected table.
     *
     * @var value-of<FilterNumberArrayTypeColumnOnCallTableColumn> $column
     */
    #[JsonProperty('column')]
    public string $column;

    /**
     * This is the operator to use for the filter.
     * The operator must be `in` or `not_in`.
     *
     * @var value-of<FilterNumberArrayTypeColumnOnCallTableOperator> $operator
     */
    #[JsonProperty('operator')]
    public string $operator;

    /**
     * @var array<float> $value This is the value to filter on.
     */
    #[JsonProperty('value'), ArrayType(['float'])]
    public array $value;

    /**
     * @param array{
     *   column: value-of<FilterNumberArrayTypeColumnOnCallTableColumn>,
     *   operator: value-of<FilterNumberArrayTypeColumnOnCallTableOperator>,
     *   value: array<float>,
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
