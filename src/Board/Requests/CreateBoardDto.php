<?php

namespace Vapi\Board\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Types\BoardInsightItem;
use Vapi\Types\BoardMetricWidgetItem;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use Vapi\Core\Types\Union;
use Vapi\Types\BoardLayout;
use Vapi\Types\InsightTimeRangeWithStep;

class CreateBoardDto extends JsonSerializableType
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
     *   name: string,
     *   layout: BoardLayout,
     *   items?: ?array<(
     *    BoardInsightItem
     *   |BoardMetricWidgetItem
     * )>,
     *   timeRangeOverride?: ?InsightTimeRangeWithStep,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->items = $values['items'] ?? null;
        $this->name = $values['name'];
        $this->layout = $values['layout'];
        $this->timeRangeOverride = $values['timeRangeOverride'] ?? null;
    }
}
