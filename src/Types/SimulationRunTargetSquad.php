<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationRunTargetSquad extends JsonSerializableType
{
    /**
     * @var ?string $squadId ID of an existing squad to test against. Cannot be combined with inline squad.
     */
    #[JsonProperty('squadId')]
    public ?string $squadId;

    /**
     * @var ?CreateSquadDto $squad Inline squad configuration to test against. Cannot be combined with squadId.
     */
    #[JsonProperty('squad')]
    public ?CreateSquadDto $squad;

    /**
     * @param array{
     *   squadId?: ?string,
     *   squad?: ?CreateSquadDto,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->squadId = $values['squadId'] ?? null;
        $this->squad = $values['squad'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
