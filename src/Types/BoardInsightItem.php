<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class BoardInsightItem extends JsonSerializableType
{
    /**
     * @var value-of<BoardInsightItemType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $insightId
     */
    #[JsonProperty('insightId')]
    public string $insightId;

    /**
     * @var ?string $systemKey
     */
    #[JsonProperty('systemKey')]
    public ?string $systemKey;

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
     * @param array{
     *   type: value-of<BoardInsightItemType>,
     *   insightId: string,
     *   position: BoardItemPosition,
     *   size: BoardItemSize,
     *   systemKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->insightId = $values['insightId'];
        $this->systemKey = $values['systemKey'] ?? null;
        $this->position = $values['position'];
        $this->size = $values['size'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
