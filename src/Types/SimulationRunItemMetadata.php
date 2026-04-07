<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SimulationRunItemMetadata extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $assistant This is a snapshot of the assistant at run creation time.
     */
    #[JsonProperty('assistant'), ArrayType(['string' => 'mixed'])]
    public ?array $assistant;

    /**
     * @var ?array<string, mixed> $squad This is a snapshot of the squad at run creation time.
     */
    #[JsonProperty('squad'), ArrayType(['string' => 'mixed'])]
    public ?array $squad;

    /**
     * @var ?array<string, mixed> $scenario This is a snapshot of the scenario at run creation time.
     */
    #[JsonProperty('scenario'), ArrayType(['string' => 'mixed'])]
    public ?array $scenario;

    /**
     * @var ?array<string, mixed> $personality This is a snapshot of the personality at run creation time.
     */
    #[JsonProperty('personality'), ArrayType(['string' => 'mixed'])]
    public ?array $personality;

    /**
     * @var ?array<string, mixed> $simulation This is a snapshot of the simulation at run creation time.
     */
    #[JsonProperty('simulation'), ArrayType(['string' => 'mixed'])]
    public ?array $simulation;

    /**
     * @var ?SimulationRunItemCallMetadata $call This is the call-related data (transcript, messages, recording).
     */
    #[JsonProperty('call')]
    public ?SimulationRunItemCallMetadata $call;

    /**
     * @var ?array<string, mixed> $hooks Hook execution state for this run item (used for idempotency + debugging).
     */
    #[JsonProperty('hooks'), ArrayType(['string' => 'mixed'])]
    public ?array $hooks;

    /**
     * @param array{
     *   assistant?: ?array<string, mixed>,
     *   squad?: ?array<string, mixed>,
     *   scenario?: ?array<string, mixed>,
     *   personality?: ?array<string, mixed>,
     *   simulation?: ?array<string, mixed>,
     *   call?: ?SimulationRunItemCallMetadata,
     *   hooks?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->assistant = $values['assistant'] ?? null;
        $this->squad = $values['squad'] ?? null;
        $this->scenario = $values['scenario'] ?? null;
        $this->personality = $values['personality'] ?? null;
        $this->simulation = $values['simulation'] ?? null;
        $this->call = $values['call'] ?? null;
        $this->hooks = $values['hooks'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
