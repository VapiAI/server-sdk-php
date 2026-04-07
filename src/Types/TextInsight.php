<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use Vapi\Core\Types\Union;
use DateTime;
use Vapi\Core\Types\Date;

class TextInsight extends JsonSerializableType
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
     * @var string $id This is the unique identifier for the Insight.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId This is the unique identifier for the org that this Insight belongs to.
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var DateTime $createdAt This is the ISO 8601 date-time string of when the Insight was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt This is the ISO 8601 date-time string of when the Insight was last updated.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   queries: array<(
     *    JsonQueryOnCallTableWithStringTypeColumn
     *   |JsonQueryOnCallTableWithNumberTypeColumn
     *   |JsonQueryOnCallTableWithStructuredOutputColumn
     * )>,
     *   id: string,
     *   orgId: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   name?: ?string,
     *   formula?: ?array<string, mixed>,
     *   timeRange?: ?InsightTimeRange,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'] ?? null;
        $this->formula = $values['formula'] ?? null;
        $this->timeRange = $values['timeRange'] ?? null;
        $this->queries = $values['queries'];
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
