<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * Workflow model configuration for Anthropic, including model selection, thinking, temperature, and maximum output tokens.
 */
class WorkflowAnthropicModel extends JsonSerializableType
{
    /**
     * These are the messages used to customize the prompt used for structured output extraction.
     *
     * When provided, these messages replace the default prompts. For text extraction, message contents support LiquidJS templating with the following variables:
     * - `{{transcript}}`, `{{messages}}`, or `{{messagesWithConfidence}}` to reference the conversation (one is required)
     * - `{{structuredOutput.name}}`, `{{structuredOutput.description}}`, or `{{structuredOutput.schema}}` to reference the structured output definition (one is required)
     * - `{{systemPrompt}}`, `{{callEndedReason}}`, `{{duration}}`, `{{startedAt}}`, `{{endedAt}}`, and any `assistantOverrides.variableValues`
     *
     * In structured outputs, `{{messages}}` includes conversation text and tool calls/results, but omits caller transcription-confidence fields. For text extraction, `{{messagesWithConfidence}}` includes the original message history with transcription confidence for outputs that explicitly need it. These variables also apply in structured-output schema descriptions. Audio-targeted (`messages-with-audio`) extraction ignores custom messages. Stored call artifacts and API messages retain their confidence data. `{{transcript}}` is the spoken text only, which uses significantly fewer tokens.
     *
     * If not provided, default system and user prompts are used.
     *
     * @var ?array<OpenAiMessage> $messages
     */
    #[JsonProperty('messages'), ArrayType([OpenAiMessage::class])]
    public ?array $messages;

    /**
     * @var value-of<WorkflowAnthropicModelModel> $model This is the specific model that will be used.
     */
    #[JsonProperty('model')]
    public string $model;

    /**
     * This is the optional configuration for Anthropic's thinking feature.
     *
     * - If provided, `maxTokens` must be greater than `thinking.budgetTokens`.
     *
     * @var ?AnthropicThinkingConfig $thinking
     */
    #[JsonProperty('thinking')]
    public ?AnthropicThinkingConfig $thinking;

    /**
     * @var ?float $temperature This is the temperature of the model.
     */
    #[JsonProperty('temperature')]
    public ?float $temperature;

    /**
     * @var ?float $maxTokens This is the max tokens of the model.
     */
    #[JsonProperty('maxTokens')]
    public ?float $maxTokens;

    /**
     * @param array{
     *   model: value-of<WorkflowAnthropicModelModel>,
     *   messages?: ?array<OpenAiMessage>,
     *   thinking?: ?AnthropicThinkingConfig,
     *   temperature?: ?float,
     *   maxTokens?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->messages = $values['messages'] ?? null;
        $this->model = $values['model'];
        $this->thinking = $values['thinking'] ?? null;
        $this->temperature = $values['temperature'] ?? null;
        $this->maxTokens = $values['maxTokens'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
