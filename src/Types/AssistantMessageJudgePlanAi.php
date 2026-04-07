<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AssistantMessageJudgePlanAi extends JsonSerializableType
{
    /**
     * This is the model to use for the LLM-as-a-judge.
     * If not provided, will default to the assistant's model.
     *
     * The instructions on how to evaluate the model output with this LLM-Judge must be passed as a system message in the messages array of the model.
     *
     * The Mock conversation can be passed to the LLM-Judge to evaluate using the prompt {{messages}} and will be evaluated as a LiquidJS Variable. To access and judge only the last message, use {{messages[-1]}}
     *
     * The LLM-Judge must respond with "pass" or "fail" and only those two responses are allowed.
     *
     * @var AssistantMessageJudgePlanAiModel $model
     */
    #[JsonProperty('model')]
    public AssistantMessageJudgePlanAiModel $model;

    /**
     * This is the type of the judge plan.
     * Use 'ai' to evaluate the assistant message content using LLM-as-a-judge.
     * @default 'ai'
     *
     * @var value-of<AssistantMessageJudgePlanAiType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * This is the flag to enable automatically adding the liquid variable {{messages}} to the model's messages array
     * This is only applicable if the user has not provided any messages in the model's messages array
     * @default true
     *
     * @var ?bool $autoIncludeMessageHistory
     */
    #[JsonProperty('autoIncludeMessageHistory')]
    public ?bool $autoIncludeMessageHistory;

    /**
     * @param array{
     *   model: AssistantMessageJudgePlanAiModel,
     *   type: value-of<AssistantMessageJudgePlanAiType>,
     *   autoIncludeMessageHistory?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->model = $values['model'];
        $this->type = $values['type'];
        $this->autoIncludeMessageHistory = $values['autoIncludeMessageHistory'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
