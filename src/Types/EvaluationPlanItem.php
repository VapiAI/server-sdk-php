<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Union;

class EvaluationPlanItem extends JsonSerializableType
{
    /**
     * This is the ID of an existing structured output to use for evaluation.
     * Mutually exclusive with structuredOutput.
     *
     * @var ?string $structuredOutputId
     */
    #[JsonProperty('structuredOutputId')]
    public ?string $structuredOutputId;

    /**
     * This is an inline structured output definition for evaluation.
     * Mutually exclusive with structuredOutputId.
     * Only primitive schema types (string, number, integer, boolean) are allowed.
     *
     * @var ?CreateStructuredOutputDto $structuredOutput
     */
    #[JsonProperty('structuredOutput')]
    public ?CreateStructuredOutputDto $structuredOutput;

    /**
     * This is the comparison operator to use when evaluating the extracted value against the expected value.
     * Available operators depend on the structured output's schema type:
     * - boolean: '=', '!='
     * - string: '=', '!='
     * - number/integer: '=', '!=', '>', '<', '>=', '<='
     *
     * @var value-of<EvaluationPlanItemComparator> $comparator
     */
    #[JsonProperty('comparator')]
    public string $comparator;

    /**
     * This is the expected value to compare against the extracted structured output result.
     * Type should match the structured output's schema type.
     *
     * @var (
     *    float
     *   |string
     *   |bool
     * ) $value
     */
    #[JsonProperty('value'), Union('float', 'string', 'bool')]
    public float|string|bool $value;

    /**
     * This is whether this evaluation must pass for the simulation to pass.
     * Defaults to true. If false, the result is informational only.
     *
     * @var ?bool $required
     */
    #[JsonProperty('required')]
    public ?bool $required;

    /**
     * @param array{
     *   comparator: value-of<EvaluationPlanItemComparator>,
     *   value: (
     *    float
     *   |string
     *   |bool
     * ),
     *   structuredOutputId?: ?string,
     *   structuredOutput?: ?CreateStructuredOutputDto,
     *   required?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->structuredOutputId = $values['structuredOutputId'] ?? null;
        $this->structuredOutput = $values['structuredOutput'] ?? null;
        $this->comparator = $values['comparator'];
        $this->value = $values['value'];
        $this->required = $values['required'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
