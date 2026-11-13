<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class EndedReasonCondition extends JsonSerializableType
{
    /**
     * This is the membership operator applied against `values`.
     *
     * - 'oneOf': the structured output runs only if the call's ended reason is in `values`.
     * - 'notOneOf': the structured output runs only if the call's ended reason is NOT in `values`.
     *
     * @var value-of<EndedReasonConditionOperator> $operator
     */
    #[JsonProperty('operator')]
    public string $operator;

    /**
     * These are the ended reasons compared against the call's ended reason.
     *
     * Any string is accepted so configurations never break when new ended
     * reasons are introduced. Must contain at least one value.
     *
     * @var array<string> $values
     */
    #[JsonProperty('values'), ArrayType(['string'])]
    public array $values;

    /**
     * @param array{
     *   operator: value-of<EndedReasonConditionOperator>,
     *   values: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->operator = $values['operator'];
        $this->values = $values['values'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
