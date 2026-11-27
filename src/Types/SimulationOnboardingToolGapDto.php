<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SimulationOnboardingToolGapDto extends JsonSerializableType
{
    /**
     * @var string $toolName Function name of the tool, e.g. `handoff_to_group_1` or `transferCall`.
     */
    #[JsonProperty('toolName')]
    public string $toolName;

    /**
     * @var ?string $assistantName Assistant the tool belongs to, when it is a handoff destination's tool. Unset for the assistant's own tools.
     */
    #[JsonProperty('assistantName')]
    public ?string $assistantName;

    /**
     * @var value-of<SimulationOnboardingToolGapDtoReason> $reason Why the path is not exercised: a reason the simulations mock the tool, or why a native path is never reached. New reasons may be added.
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @var ?array<string> $destinationNames Static destinations the simulations do not reach through this tool.
     */
    #[JsonProperty('destinationNames'), ArrayType(['string'])]
    public ?array $destinationNames;

    /**
     * @param array{
     *   toolName: string,
     *   reason: value-of<SimulationOnboardingToolGapDtoReason>,
     *   assistantName?: ?string,
     *   destinationNames?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->toolName = $values['toolName'];
        $this->assistantName = $values['assistantName'] ?? null;
        $this->reason = $values['reason'];
        $this->destinationNames = $values['destinationNames'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
