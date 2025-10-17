<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ContextEngineeringPlanLastNMessages extends JsonSerializableType
{
    /**
     * @var float $maxMessages This is the maximum number of messages to include in the context engineering plan.
     */
    #[JsonProperty('maxMessages')]
    public float $maxMessages;

    /**
     * @param array{
     *   maxMessages: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->maxMessages = $values['maxMessages'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
