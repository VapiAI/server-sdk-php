<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class BoardLayout extends JsonSerializableType
{
    /**
     * This is the number of columns in the Board.
     * For now, it is fixed to 6.
     *
     * @var float $columns
     */
    #[JsonProperty('columns')]
    public float $columns;

    /**
     * @param array{
     *   columns: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->columns = $values['columns'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
