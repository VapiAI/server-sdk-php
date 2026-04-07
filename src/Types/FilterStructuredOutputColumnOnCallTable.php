<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class FilterStructuredOutputColumnOnCallTable extends JsonSerializableType
{
    /**
     * This is the column in the call table that will be filtered on.
     * Structured Output Type columns are only to filter on artifact.structuredOutputs[OutputID] column.
     *
     * @var value-of<FilterStructuredOutputColumnOnCallTableColumn> $column
     */
    #[JsonProperty('column')]
    public string $column;

    /**
     * This is the operator to use for the filter.
     * The operator depends on the value type of the structured output.
     * If the structured output is a string or boolean, the operator must be "=", "!="
     * If the structured output is a number, the operator must be "=", ">", "<", ">=", "<="
     * If the structured output is an array, the operator must be "in" or "not_in"
     *
     * @var value-of<FilterStructuredOutputColumnOnCallTableOperator> $operator
     */
    #[JsonProperty('operator')]
    public string $operator;

    /**
     * This is the value to filter on.
     * The value type depends on the structured output type being filtered.
     *
     * @var array<string, mixed> $value
     */
    #[JsonProperty('value'), ArrayType(['string' => 'mixed'])]
    public array $value;

    /**
     * @param array{
     *   column: value-of<FilterStructuredOutputColumnOnCallTableColumn>,
     *   operator: value-of<FilterStructuredOutputColumnOnCallTableOperator>,
     *   value: array<string, mixed>,
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
