<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * An AI-evaluated boolean condition that determines whether a workflow follows an edge.
 */
class AiEdgeCondition extends JsonSerializableType
{
    /**
     * @var value-of<AiEdgeConditionType> $type Selects an AI-evaluated workflow edge condition.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $prompt This is the prompt for the AI edge condition. It should evaluate to a boolean.
     */
    #[JsonProperty('prompt')]
    public string $prompt;

    /**
     * @param array{
     *   type: value-of<AiEdgeConditionType>,
     *   prompt: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->prompt = $values['prompt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
