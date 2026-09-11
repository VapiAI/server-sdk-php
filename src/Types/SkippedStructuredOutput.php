<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SkippedStructuredOutput extends JsonSerializableType
{
    /**
     * @var string $name This is the name of the structured output that was skipped.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * This is the first condition that was not met. Conditions use AND semantics, so
     * evaluation stops as soon as one condition does not pass.
     *
     * @var SkippedStructuredOutputUnmetCondition $unmetCondition
     */
    #[JsonProperty('unmetCondition')]
    public SkippedStructuredOutputUnmetCondition $unmetCondition;

    /**
     * @param array{
     *   name: string,
     *   unmetCondition: SkippedStructuredOutputUnmetCondition,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->unmetCondition = $values['unmetCondition'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
