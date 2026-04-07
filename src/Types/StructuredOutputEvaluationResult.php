<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Union;

class StructuredOutputEvaluationResult extends JsonSerializableType
{
    /**
     * This is the ID of the structured output that was evaluated.
     * Will be 'inline' for inline structured output definitions.
     *
     * @var string $structuredOutputId
     */
    #[JsonProperty('structuredOutputId')]
    public string $structuredOutputId;

    /**
     * @var string $name This is the name of the structured output.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var (
     *    float
     *   |string
     *   |bool
     * )|null $extractedValue This is the value extracted from the call by the structured output.
     */
    #[JsonProperty('extractedValue'), Union('float', 'string', 'bool', 'null')]
    public float|string|bool|null $extractedValue;

    /**
     * @var (
     *    float
     *   |string
     *   |bool
     * ) $expectedValue This is the expected value that was defined in the evaluation plan.
     */
    #[JsonProperty('expectedValue'), Union('float', 'string', 'bool')]
    public float|string|bool $expectedValue;

    /**
     * @var value-of<StructuredOutputEvaluationResultComparator> $comparator This is the comparison operator used for evaluation.
     */
    #[JsonProperty('comparator')]
    public string $comparator;

    /**
     * @var bool $passed This indicates whether the evaluation passed (extracted value matched expected value using comparator).
     */
    #[JsonProperty('passed')]
    public bool $passed;

    /**
     * @var bool $required This indicates whether this evaluation was required for the simulation to pass.
     */
    #[JsonProperty('required')]
    public bool $required;

    /**
     * @var ?string $error This contains any error that occurred during extraction.
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?bool $isSkipped This indicates whether this evaluation was skipped (e.g., multimodal in chat mode).
     */
    #[JsonProperty('isSkipped')]
    public ?bool $isSkipped;

    /**
     * @var ?string $skipReason This contains the reason for skipping the evaluation.
     */
    #[JsonProperty('skipReason')]
    public ?string $skipReason;

    /**
     * @param array{
     *   structuredOutputId: string,
     *   name: string,
     *   expectedValue: (
     *    float
     *   |string
     *   |bool
     * ),
     *   comparator: value-of<StructuredOutputEvaluationResultComparator>,
     *   passed: bool,
     *   required: bool,
     *   extractedValue?: (
     *    float
     *   |string
     *   |bool
     * )|null,
     *   error?: ?string,
     *   isSkipped?: ?bool,
     *   skipReason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->structuredOutputId = $values['structuredOutputId'];
        $this->name = $values['name'];
        $this->extractedValue = $values['extractedValue'] ?? null;
        $this->expectedValue = $values['expectedValue'];
        $this->comparator = $values['comparator'];
        $this->passed = $values['passed'];
        $this->required = $values['required'];
        $this->error = $values['error'] ?? null;
        $this->isSkipped = $values['isSkipped'] ?? null;
        $this->skipReason = $values['skipReason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
