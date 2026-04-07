<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use Vapi\Core\Types\Union;

class UpdatePieInsightFromCallTableDto extends JsonSerializableType
{
    /**
     * @var ?string $name This is the name of the Insight.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * Formulas are mathematical expressions applied on the data returned by the queries to transform them before being used to create the insight.
     * The formulas needs to be a valid mathematical expression, supported by MathJS - https://mathjs.org/docs/expressions/syntax.html
     * A formula is created by using the query names as the variable.
     * The formulas must contain at least one query name in the LiquidJS format {{query_name}} or {{['query name']}} which will be substituted with the query result.
     * For example, if you have 2 queries, 'Was Booking Made' and 'Average Call Duration', you can create a formula like this:
     * ```
     * {{['Query 1']}} / {{['Query 2']}} * 100
     * ```
     *
     * ```
     * ({{[Query 1]}} * 10) + {{[Query 2]}}
     * ```
     * This will take the
     *
     * You can also use the query names as the variable in the formula.
     *
     * @var ?array<InsightFormula> $formulas
     */
    #[JsonProperty('formulas'), ArrayType([InsightFormula::class])]
    public ?array $formulas;

    /**
     * @var ?InsightTimeRange $timeRange
     */
    #[JsonProperty('timeRange')]
    public ?InsightTimeRange $timeRange;

    /**
     * This is the group by column for the insight when table is `call`.
     * These are the columns to group the results by.
     * All results are grouped by the time range step by default.
     *
     * @var ?value-of<UpdatePieInsightFromCallTableDtoGroupBy> $groupBy
     */
    #[JsonProperty('groupBy')]
    public ?string $groupBy;

    /**
     * @var ?array<(
     *    JsonQueryOnCallTableWithStringTypeColumn
     *   |JsonQueryOnCallTableWithNumberTypeColumn
     *   |JsonQueryOnCallTableWithStructuredOutputColumn
     * )> $queries These are the queries to run to generate the insight.
     */
    #[JsonProperty('queries'), ArrayType([new Union(JsonQueryOnCallTableWithStringTypeColumn::class, JsonQueryOnCallTableWithNumberTypeColumn::class, JsonQueryOnCallTableWithStructuredOutputColumn::class)])]
    public ?array $queries;

    /**
     * @param array{
     *   name?: ?string,
     *   formulas?: ?array<InsightFormula>,
     *   timeRange?: ?InsightTimeRange,
     *   groupBy?: ?value-of<UpdatePieInsightFromCallTableDtoGroupBy>,
     *   queries?: ?array<(
     *    JsonQueryOnCallTableWithStringTypeColumn
     *   |JsonQueryOnCallTableWithNumberTypeColumn
     *   |JsonQueryOnCallTableWithStructuredOutputColumn
     * )>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->formulas = $values['formulas'] ?? null;
        $this->timeRange = $values['timeRange'] ?? null;
        $this->groupBy = $values['groupBy'] ?? null;
        $this->queries = $values['queries'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
