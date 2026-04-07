<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use Vapi\Core\Types\Union;

class JsonQueryOnCallTableWithStringTypeColumn extends JsonSerializableType
{
    /**
     * @var value-of<JsonQueryOnCallTableWithStringTypeColumnType> $type This is the type of query. Only allowed type is "vapiql-json".
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var value-of<JsonQueryOnCallTableWithStringTypeColumnTable> $table This is the table that will be queried.
     */
    #[JsonProperty('table')]
    public string $table;

    /**
     * This is the filters to apply to the insight.
     * The discriminator automatically selects the correct filter type based on column and operator.
     *
     * @var ?array<(
     *    FilterStringTypeColumnOnCallTable
     *   |FilterStringArrayTypeColumnOnCallTable
     *   |FilterNumberTypeColumnOnCallTable
     *   |FilterNumberArrayTypeColumnOnCallTable
     *   |FilterDateTypeColumnOnCallTable
     *   |FilterStructuredOutputColumnOnCallTable
     * )> $filters
     */
    #[JsonProperty('filters'), ArrayType([new Union(FilterStringTypeColumnOnCallTable::class, FilterStringArrayTypeColumnOnCallTable::class, FilterNumberTypeColumnOnCallTable::class, FilterNumberArrayTypeColumnOnCallTable::class, FilterDateTypeColumnOnCallTable::class, FilterStructuredOutputColumnOnCallTable::class)])]
    public ?array $filters;

    /**
     * This is the column that will be queried in the selected table.
     * Available columns depend on the selected table.
     * String Type columns are columns where the rows store String data
     *
     * @var value-of<JsonQueryOnCallTableWithStringTypeColumnColumn> $column
     */
    #[JsonProperty('column')]
    public string $column;

    /**
     * This is the aggregation operation to perform on the column.
     * When the column is a string type, the operation must be "count".
     *
     * @var value-of<JsonQueryOnCallTableWithStringTypeColumnOperation> $operation
     */
    #[JsonProperty('operation')]
    public string $operation;

    /**
     * This is the name of the query.
     * It will be used to label the query in the insight board on the UI.
     *
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   type: value-of<JsonQueryOnCallTableWithStringTypeColumnType>,
     *   table: value-of<JsonQueryOnCallTableWithStringTypeColumnTable>,
     *   column: value-of<JsonQueryOnCallTableWithStringTypeColumnColumn>,
     *   operation: value-of<JsonQueryOnCallTableWithStringTypeColumnOperation>,
     *   filters?: ?array<(
     *    FilterStringTypeColumnOnCallTable
     *   |FilterStringArrayTypeColumnOnCallTable
     *   |FilterNumberTypeColumnOnCallTable
     *   |FilterNumberArrayTypeColumnOnCallTable
     *   |FilterDateTypeColumnOnCallTable
     *   |FilterStructuredOutputColumnOnCallTable
     * )>,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->table = $values['table'];
        $this->filters = $values['filters'] ?? null;
        $this->column = $values['column'];
        $this->operation = $values['operation'];
        $this->name = $values['name'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
