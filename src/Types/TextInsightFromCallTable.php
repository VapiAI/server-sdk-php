<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use Vapi\Core\Types\Union;

class TextInsightFromCallTable extends JsonSerializableType
{
    /**
     * @var ?string $name This is the name of the Insight.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * This is the type of the Insight.
     * It is required to be `text` to create a text insight.
     *
     * @var value-of<TextInsightFromCallTableType> $type
     */
    #[JsonProperty('type')]
    public string $type;

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
     * @var ?array<string, mixed> $formula
     */
    #[JsonProperty('formula'), ArrayType(['string' => 'mixed'])]
    public ?array $formula;

    /**
     * @var ?InsightTimeRange $timeRange
     */
    #[JsonProperty('timeRange')]
    public ?InsightTimeRange $timeRange;

    /**
     * These are the queries to run to generate the insight.
     * For Text Insights, we only allow a single query, or require a formula if multiple queries are provided
     *
     * @var array<(
     *    JsonQueryOnCallTableWithStringTypeColumn
     *   |JsonQueryOnCallTableWithNumberTypeColumn
     *   |JsonQueryOnCallTableWithStructuredOutputColumn
     * )> $queries
     */
    #[JsonProperty('queries'), ArrayType([new Union(JsonQueryOnCallTableWithStringTypeColumn::class, JsonQueryOnCallTableWithNumberTypeColumn::class, JsonQueryOnCallTableWithStructuredOutputColumn::class)])]
    public array $queries;

    /**
     * @param array{
     *   type: value-of<TextInsightFromCallTableType>,
     *   queries: array<(
     *    JsonQueryOnCallTableWithStringTypeColumn
     *   |JsonQueryOnCallTableWithNumberTypeColumn
     *   |JsonQueryOnCallTableWithStructuredOutputColumn
     * )>,
     *   name?: ?string,
     *   formula?: ?array<string, mixed>,
     *   timeRange?: ?InsightTimeRange,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'] ?? null;
        $this->type = $values['type'];
        $this->formula = $values['formula'] ?? null;
        $this->timeRange = $values['timeRange'] ?? null;
        $this->queries = $values['queries'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
