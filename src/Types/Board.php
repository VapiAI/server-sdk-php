<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use Vapi\Core\Types\Union;
use DateTime;
use Vapi\Core\Types\Date;

class Board extends JsonSerializableType
{
    /**
     * @var ?array<(
     *    BoardInsightItem
     *   |BoardMetricWidgetItem
     * )> $items This is the contents of the Board, which is an array of objects defining the type, contents, and position of the widgets on the Board.
     */
    #[JsonProperty('items'), ArrayType([new Union(BoardInsightItem::class, BoardMetricWidgetItem::class)])]
    public ?array $items;

    /**
     * @var string $id This is the unique identifier for the Board.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId This is the unique identifier for the org that this Board belongs to.
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var DateTime $createdAt This is the ISO 8601 date-time string of when the Board was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt This is the ISO 8601 date-time string of when the Board was last updated.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * Server-owned key for system-provisioned boards. User create/update DTOs do
     * not accept this field.
     *
     * @var ?string $systemKey
     */
    #[JsonProperty('systemKey')]
    public ?string $systemKey;

    /**
     * @var string $name This is the name of the Board.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var BoardLayout $layout This is the layout of the Board.
     */
    #[JsonProperty('layout')]
    public BoardLayout $layout;

    /**
     * This is the timerange override for the board.
     * By default, individual insights have their own timerange.
     * This is a global override for the board which will be passed to all insights on the board.
     *
     * @var ?InsightTimeRangeWithStep $timeRangeOverride
     */
    #[JsonProperty('timeRangeOverride')]
    public ?InsightTimeRangeWithStep $timeRangeOverride;

    /**
     * @param array{
     *   id: string,
     *   orgId: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   name: string,
     *   layout: BoardLayout,
     *   items?: ?array<(
     *    BoardInsightItem
     *   |BoardMetricWidgetItem
     * )>,
     *   systemKey?: ?string,
     *   timeRangeOverride?: ?InsightTimeRangeWithStep,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->items = $values['items'] ?? null;
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->systemKey = $values['systemKey'] ?? null;
        $this->name = $values['name'];
        $this->layout = $values['layout'];
        $this->timeRangeOverride = $values['timeRangeOverride'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
