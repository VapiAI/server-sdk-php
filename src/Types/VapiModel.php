<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class VapiModel extends JsonSerializableType
{
    /**
     * @var ?array<OpenAiMessage> $messages This is the starting state for the conversation.
     */
    #[JsonProperty('messages'), ArrayType([OpenAiMessage::class])]
    public ?array $messages;

    /**
     * These are the tools that the assistant can use during the call. To use existing tools, use `toolIds`.
     *
     * Both `tools` and `toolIds` can be used together.
     *
     * @var ?array<VapiModelToolsItem> $tools
     */
    #[JsonProperty('tools'), ArrayType([VapiModelToolsItem::class])]
    public ?array $tools;

    /**
     * These are the tools that the assistant can use during the call. To use transient tools, use `tools`.
     *
     * Both `tools` and `toolIds` can be used together.
     *
     * @var ?array<string> $toolIds
     */
    #[JsonProperty('toolIds'), ArrayType(['string'])]
    public ?array $toolIds;

    /**
     * These are version-pinned references to tools. Each entry pins a specific
     * version of a tool by `(toolId, version)`. When the same `toolId` appears
     * in both `toolIds` and `toolRefs[]`, the `toolRefs` pin wins (the
     * `toolIds` entry is dropped at write time).
     *
     * @var ?array<ToolRef> $toolRefs
     */
    #[JsonProperty('toolRefs'), ArrayType([ToolRef::class])]
    public ?array $toolRefs;

    /**
     * @var ?CreateCustomKnowledgeBaseDto $knowledgeBase These are the options for the knowledge base.
     */
    #[JsonProperty('knowledgeBase')]
    public ?CreateCustomKnowledgeBaseDto $knowledgeBase;

    /**
     * White-label Vapi models are selected by `version`, not a model name, so
     * `model` is optional here (the runtime already accepts a version-only Vapi
     * payload). Overriding the required `ModelBase.model`: the declared type stays
     * `string` to match the base (avoids TS2416) and the `= undefined!` initializer
     * satisfies TS2612 for the field override, while `@IsOptional` +
     * `@ApiPropertyOptional` make validation and the generated OpenAPI schema treat
     * it as optional (so `VapiModel.required` is `['provider']`).
     *
     * @var ?string $model
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * Vapi-managed model version (update channel). When set, this is a Vapi-managed
     * LLM routed by the registry; when absent, this is the legacy workflow form
     * below (`steps` / `workflow`).
     *
     * @var ?value-of<VapiModelVersion> $version
     */
    #[JsonProperty('version')]
    public ?string $version;

    /**
     * @var ?string $workflowId This is the workflow that will be used for the call. To use a transient workflow, use `workflow` instead.
     */
    #[JsonProperty('workflowId')]
    public ?string $workflowId;

    /**
     * @var ?WorkflowUserEditable $workflow This is the workflow that will be used for the call. To use an existing workflow, use `workflowId` instead.
     */
    #[JsonProperty('workflow')]
    public ?WorkflowUserEditable $workflow;

    /**
     * @var ?float $temperature This is the temperature that will be used for calls. Default is 0.5.
     */
    #[JsonProperty('temperature')]
    public ?float $temperature;

    /**
     * This determines whether we detect user's emotion while they speak and send it as an additional info to model.
     *
     * Default `false` because the model is usually are good at understanding the user's emotion from text.
     *
     * @default false
     *
     * @var ?bool $emotionRecognitionEnabled
     */
    #[JsonProperty('emotionRecognitionEnabled')]
    public ?bool $emotionRecognitionEnabled;

    /**
     * This sets how many turns at the start of the conversation to use a smaller, faster model from the same provider before switching to the primary model. Example, gpt-3.5-turbo if provider is openai.
     *
     * Default is 0.
     *
     * @default 0
     *
     * @var ?float $numFastTurns
     */
    #[JsonProperty('numFastTurns')]
    public ?float $numFastTurns;

    /**
     * @param array{
     *   messages?: ?array<OpenAiMessage>,
     *   tools?: ?array<VapiModelToolsItem>,
     *   toolIds?: ?array<string>,
     *   toolRefs?: ?array<ToolRef>,
     *   knowledgeBase?: ?CreateCustomKnowledgeBaseDto,
     *   model?: ?string,
     *   version?: ?value-of<VapiModelVersion>,
     *   workflowId?: ?string,
     *   workflow?: ?WorkflowUserEditable,
     *   temperature?: ?float,
     *   emotionRecognitionEnabled?: ?bool,
     *   numFastTurns?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->messages = $values['messages'] ?? null;
        $this->tools = $values['tools'] ?? null;
        $this->toolIds = $values['toolIds'] ?? null;
        $this->toolRefs = $values['toolRefs'] ?? null;
        $this->knowledgeBase = $values['knowledgeBase'] ?? null;
        $this->model = $values['model'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->workflowId = $values['workflowId'] ?? null;
        $this->workflow = $values['workflow'] ?? null;
        $this->temperature = $values['temperature'] ?? null;
        $this->emotionRecognitionEnabled = $values['emotionRecognitionEnabled'] ?? null;
        $this->numFastTurns = $values['numFastTurns'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
