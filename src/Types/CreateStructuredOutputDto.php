<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CreateStructuredOutputDto extends JsonSerializableType
{
    /**
     * This is the type of structured output.
     *
     * - 'ai': Uses an LLM to extract structured data from the conversation (default).
     * - 'regex': Uses a regex pattern to extract data from the transcript without an LLM.
     *
     * Defaults to 'ai' if not specified.
     *
     * @var ?value-of<CreateStructuredOutputDtoType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * This is the regex pattern to match against the transcript.
     *
     * Only used when type is 'regex'. Supports both raw patterns (e.g. '\d+') and
     * regex literal format (e.g. '/\d+/gi'). Uses RE2 syntax for safety.
     *
     * The result depends on the schema type:
     * - boolean: true if the pattern matches, false otherwise
     * - string: the first match or first capture group
     * - number/integer: the first match parsed as a number
     * - array: all matches
     *
     * @var ?string $regex
     */
    #[JsonProperty('regex')]
    public ?string $regex;

    /**
     * This is the model that will be used to extract the structured output.
     *
     * To provide your own custom system and user prompts for structured output extraction, populate the messages array with your system and user messages. You can specify liquid templating in your system and user messages.
     * Between the system or user messages, you must reference either 'transcript' or 'messages' with the `{{}}` syntax to access the conversation history.
     * Between the system or user messages, you must reference a variation of the structured output with the `{{}}` syntax to access the structured output definition.
     * i.e.:
     * `{{structuredOutput}}`
     * `{{structuredOutput.name}}`
     * `{{structuredOutput.description}}`
     * `{{structuredOutput.schema}}`
     *
     * If model is not specified, GPT-4.1 will be used by default for extraction, utilizing default system and user prompts.
     * If messages or required fields are not specified, the default system and user prompts will be used.
     *
     * @var ?CreateStructuredOutputDtoModel $model
     */
    #[JsonProperty('model')]
    public ?CreateStructuredOutputDtoModel $model;

    /**
     * @var ?ComplianceOverride $compliancePlan Compliance configuration for this output. Only enable overrides if no sensitive data will be stored.
     */
    #[JsonProperty('compliancePlan')]
    public ?ComplianceOverride $compliancePlan;

    /**
     * @var string $name This is the name of the structured output.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * This is the JSON Schema definition for the structured output.
     *
     * This is required when creating a structured output. Defines the structure and validation rules for the data that will be extracted. Supports all JSON Schema features including:
     * - Objects and nested properties
     * - Arrays and array validation
     * - String, number, boolean, and null types
     * - Enums and const values
     * - Validation constraints (min/max, patterns, etc.)
     * - Composition with allOf, anyOf, oneOf
     *
     * @var JsonSchema $schema
     */
    #[JsonProperty('schema')]
    public JsonSchema $schema;

    /**
     * This is the description of what the structured output extracts.
     *
     * Use this to provide context about what data will be extracted and how it will be used.
     *
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * These are the assistant IDs that this structured output is linked to.
     *
     * When linked to assistants, this structured output will be available for extraction during those assistant's calls.
     *
     * @var ?array<string> $assistantIds
     */
    #[JsonProperty('assistantIds'), ArrayType(['string'])]
    public ?array $assistantIds;

    /**
     * These are the workflow IDs that this structured output is linked to.
     *
     * When linked to workflows, this structured output will be available for extraction during those workflow's execution.
     *
     * @var ?array<string> $workflowIds
     */
    #[JsonProperty('workflowIds'), ArrayType(['string'])]
    public ?array $workflowIds;

    /**
     * @param array{
     *   name: string,
     *   schema: JsonSchema,
     *   type?: ?value-of<CreateStructuredOutputDtoType>,
     *   regex?: ?string,
     *   model?: ?CreateStructuredOutputDtoModel,
     *   compliancePlan?: ?ComplianceOverride,
     *   description?: ?string,
     *   assistantIds?: ?array<string>,
     *   workflowIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'] ?? null;
        $this->regex = $values['regex'] ?? null;
        $this->model = $values['model'] ?? null;
        $this->compliancePlan = $values['compliancePlan'] ?? null;
        $this->name = $values['name'];
        $this->schema = $values['schema'];
        $this->description = $values['description'] ?? null;
        $this->assistantIds = $values['assistantIds'] ?? null;
        $this->workflowIds = $values['workflowIds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
