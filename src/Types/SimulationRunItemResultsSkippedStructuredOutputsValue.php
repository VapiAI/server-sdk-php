<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SimulationRunItemResultsSkippedStructuredOutputsValue extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?array<string, mixed> $unmetCondition
     */
    #[JsonProperty('unmetCondition'), ArrayType(['string' => 'mixed'])]
    public ?array $unmetCondition;

    /**
     * @var ?value-of<SimulationRunItemResultsSkippedStructuredOutputsValueReason> $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   name: string,
     *   unmetCondition?: ?array<string, mixed>,
     *   reason?: ?value-of<SimulationRunItemResultsSkippedStructuredOutputsValueReason>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->unmetCondition = $values['unmetCondition'] ?? null;
        $this->reason = $values['reason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
