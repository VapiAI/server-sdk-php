<?php

namespace Vapi\SimulationRuns\Requests;

use Vapi\Core\Json\JsonSerializableType;

class SimulationRunControllerGenerateSuggestionsRequest extends JsonSerializableType
{
    /**
     * @var string $force Set to the string `true` to regenerate improvement suggestions even if they already exist.
     */
    public string $force;

    /**
     * @var ?string $persist
     */
    public ?string $persist;

    /**
     * @param array{
     *   force: string,
     *   persist?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->force = $values['force'];
        $this->persist = $values['persist'] ?? null;
    }
}
