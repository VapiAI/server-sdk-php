<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class MinCallDurationCondition extends JsonSerializableType
{
    /**
     * This is the minimum call duration in seconds required for the structured
     * output to run.
     *
     * When timestamps are unavailable (for example, chat sessions have no call
     * timestamps), this check passes and does not block the structured output.
     *
     * @var float $seconds
     */
    #[JsonProperty('seconds')]
    public float $seconds;

    /**
     * @param array{
     *   seconds: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->seconds = $values['seconds'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
