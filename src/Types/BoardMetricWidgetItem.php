<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class BoardMetricWidgetItem extends JsonSerializableType
{
    /**
     * @var value-of<BoardMetricWidgetItemType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var BoardItemPosition $position
     */
    #[JsonProperty('position')]
    public BoardItemPosition $position;

    /**
     * @var BoardItemSize $size
     */
    #[JsonProperty('size')]
    public BoardItemSize $size;

    /**
     * @var ?string $insightId
     */
    #[JsonProperty('insightId')]
    public ?string $insightId;

    /**
     * @var ?string $systemKey
     */
    #[JsonProperty('systemKey')]
    public ?string $systemKey;

    /**
     * @param array{
     *   type: value-of<BoardMetricWidgetItemType>,
     *   position: BoardItemPosition,
     *   size: BoardItemSize,
     *   insightId?: ?string,
     *   systemKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->position = $values['position'];
        $this->size = $values['size'];
        $this->insightId = $values['insightId'] ?? null;
        $this->systemKey = $values['systemKey'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
