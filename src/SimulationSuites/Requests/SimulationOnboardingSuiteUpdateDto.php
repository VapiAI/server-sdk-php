<?php

namespace Vapi\SimulationSuites\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use Vapi\Types\SimulationOnboardingSuiteEditDto;

class SimulationOnboardingSuiteUpdateDto extends JsonSerializableType
{
    /**
     * @var string $patchKey A new key for each edit. Replaying an applied key changes nothing and returns the current suite. A suite remembers its last 50 keys, so never reuse one.
     */
    #[JsonProperty('patchKey')]
    public string $patchKey;

    /**
     * @var ?array<string> $removeSimulationIds Simulations to take out of the suite. They are unlinked, not deleted.
     */
    #[JsonProperty('removeSimulationIds'), ArrayType(['string'])]
    public ?array $removeSimulationIds;

    /**
     * @var ?array<SimulationOnboardingSuiteEditDto> $edits Simulations to rewrite in place, at most one edit per simulation: put every change for a simulation in one instruction.
     */
    #[JsonProperty('edits'), ArrayType([SimulationOnboardingSuiteEditDto::class])]
    public ?array $edits;

    /**
     * @var ?bool $retryFailed Regenerate the scenarios that failed or did not fit when the suite was generated.
     */
    #[JsonProperty('retryFailed')]
    public ?bool $retryFailed;

    /**
     * @param array{
     *   patchKey: string,
     *   removeSimulationIds?: ?array<string>,
     *   edits?: ?array<SimulationOnboardingSuiteEditDto>,
     *   retryFailed?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->patchKey = $values['patchKey'];
        $this->removeSimulationIds = $values['removeSimulationIds'] ?? null;
        $this->edits = $values['edits'] ?? null;
        $this->retryFailed = $values['retryFailed'] ?? null;
    }
}
