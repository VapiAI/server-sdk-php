<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Union;

class EvaluationPlanItem extends JsonSerializableType
{
    /**
     * @var ?string $structuredOutputId The ID of an existing structured output to evaluate. Use this to reuse a structured output across scenarios. Provide either `structuredOutputId` or an inline `structuredOutput`.
     */
    #[JsonProperty('structuredOutputId')]
    public ?string $structuredOutputId;

    /**
     * @var ?CreateStructuredOutputDto $structuredOutput An inline structured output to evaluate, defined by its name and schema. Only primitive types (string, number, integer, boolean) are allowed. Provide either this or `structuredOutputId`.
     */
    #[JsonProperty('structuredOutput')]
    public ?CreateStructuredOutputDto $structuredOutput;

    /**
     * This is a built-in metric to evaluate instead of a structured output. Mutually exclusive with structuredOutputId
     * and structuredOutput, and only available on a scenario with `transcriptReplay`, which takes no other evaluations.
     * - wer: the word error rate of the replayed recording's transcript against the answer key, as a fraction where 0
     *   is perfect and 0.1 is 10%; insertions can push it above 1. `value` must be from 0 to 1. For example,
     *   `{ "metric": "wer", "comparator": "<=", "value": 0.1 }`.
     *
     * @var ?value-of<EvaluationPlanItemMetric> $metric
     */
    #[JsonProperty('metric')]
    public ?string $metric;

    /**
     * @var ?string $path Optional dot-notation path to a primitive leaf when evaluating an object structured output.
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @var value-of<EvaluationPlanItemComparator> $comparator How the structured output value is compared against `value`. Available operators depend on the output type. Boolean and string support `=` and `!=`; number and integer support `=`, `!=`, `>`, `<`, `>=`, `<=`.
     */
    #[JsonProperty('comparator')]
    public string $comparator;

    /**
     * @var (
     *    float
     *   |string
     *   |bool
     * ) $value The expected value the structured output is compared against. Its type should match the structured output's type, for example `true` for a boolean.
     */
    #[JsonProperty('value'), Union('float', 'string', 'bool')]
    public float|string|bool $value;

    /**
     * @var ?bool $required Set to `false` to record this evaluation's result without requiring it to pass. Default is `true`.
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
     *   metric?: ?value-of<EvaluationPlanItemMetric>,
     *   path?: ?string,
     *   required?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->structuredOutputId = $values['structuredOutputId'] ?? null;
        $this->structuredOutput = $values['structuredOutput'] ?? null;
        $this->metric = $values['metric'] ?? null;
        $this->path = $values['path'] ?? null;
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
