<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class GoalEvaluationCurrentCallRequestDto extends JsonSerializableType
{
    /**
     * @var string $callId
     */
    #[JsonProperty('callId')]
    public string $callId;

    /**
     * @var string $goalId
     */
    #[JsonProperty('goalId')]
    public string $goalId;

    /**
     * @param array{
     *   callId: string,
     *   goalId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->callId = $values['callId'];
        $this->goalId = $values['goalId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
