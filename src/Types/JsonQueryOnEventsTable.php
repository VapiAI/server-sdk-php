<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use Vapi\Core\Types\Union;

class JsonQueryOnEventsTable extends JsonSerializableType
{
    /**
     * @var value-of<JsonQueryOnEventsTableType> $type This is the type of query. Only allowed type is "vapiql-json".
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * This is the table that will be queried.
     * Must be "events" for event-based insights.
     *
     * @var value-of<JsonQueryOnEventsTableTable> $table
     */
    #[JsonProperty('table')]
    public string $table;

    /**
     * @var value-of<JsonQueryOnEventsTableOn> $on The event type to query
     */
    #[JsonProperty('on')]
    public string $on;

    /**
     * This is the operation to perform on matching events.
     * - "count": Returns the raw count of matching events
     * - "percentage": Returns (count of matching events / total calls) * 100
     *
     * @var value-of<JsonQueryOnEventsTableOperation> $operation
     */
    #[JsonProperty('operation')]
    public string $operation;

    /**
     * These are the filters to apply to the events query.
     * Each filter filters on a field specific to the event type.
     *
     * @var ?array<(
     *    EventsTableStringCondition
     *   |EventsTableNumberCondition
     *   |EventsTableBooleanCondition
     * )> $filters
     */
    #[JsonProperty('filters'), ArrayType([new Union(EventsTableStringCondition::class, EventsTableNumberCondition::class, EventsTableBooleanCondition::class)])]
    public ?array $filters;

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
     *   type: value-of<JsonQueryOnEventsTableType>,
     *   table: value-of<JsonQueryOnEventsTableTable>,
     *   on: value-of<JsonQueryOnEventsTableOn>,
     *   operation: value-of<JsonQueryOnEventsTableOperation>,
     *   filters?: ?array<(
     *    EventsTableStringCondition
     *   |EventsTableNumberCondition
     *   |EventsTableBooleanCondition
     * )>,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->table = $values['table'];
        $this->on = $values['on'];
        $this->operation = $values['operation'];
        $this->filters = $values['filters'] ?? null;
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
