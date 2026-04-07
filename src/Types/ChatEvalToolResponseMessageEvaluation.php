<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ChatEvalToolResponseMessageEvaluation extends JsonSerializableType
{
    /**
     * This is the role of the message author.
     * For a tool response message evaluation, the role is always 'tool'
     * @default 'tool'
     *
     * @var value-of<ChatEvalToolResponseMessageEvaluationRole> $role
     */
    #[JsonProperty('role')]
    public string $role;

    /**
     * This is the judge plan that instructs how to evaluate the tool response message.
     * The tool response message can be evaluated with an LLM-as-judge by defining the evaluation criteria in a prompt.
     *
     * @var AssistantMessageJudgePlanAi $judgePlan
     */
    #[JsonProperty('judgePlan')]
    public AssistantMessageJudgePlanAi $judgePlan;

    /**
     * @param array{
     *   role: value-of<ChatEvalToolResponseMessageEvaluationRole>,
     *   judgePlan: AssistantMessageJudgePlanAi,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->role = $values['role'];
        $this->judgePlan = $values['judgePlan'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
