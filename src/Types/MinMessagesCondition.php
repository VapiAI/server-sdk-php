<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class MinMessagesCondition extends JsonSerializableType
{
    /**
     * This is the minimum number of conversation messages required for the
     * structured output to run.
     *
     * A count of 0 removes the runtime default minimum, so the structured output
     * runs regardless of how few messages the conversation has.
     *
     * @var float $count
     */
    #[JsonProperty('count')]
    public float $count;

    /**
     * @param array{
     *   count: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->count = $values['count'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
