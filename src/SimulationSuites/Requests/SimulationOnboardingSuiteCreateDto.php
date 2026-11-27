<?php

namespace Vapi\SimulationSuites\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Types\SimulationOnboardingRequirementDto;
use Vapi\Core\Types\ArrayType;

class SimulationOnboardingSuiteCreateDto extends JsonSerializableType
{
    /**
     * @var string $assistantId Assistant the suite tests and is assigned to.
     */
    #[JsonProperty('assistantId')]
    public string $assistantId;

    /**
     * @var string $idempotencyKey A unique key for this suite generation request. Retrying with the same key returns the saved suite, or a 409 while generation is in progress. Use a new key for a different assistant or requirements.
     */
    #[JsonProperty('idempotencyKey')]
    public string $idempotencyKey;

    /**
     * @var array<SimulationOnboardingRequirementDto> $requirements The reviewed test requirements to generate simulations for, from the requirements draft. Each requirement must have a unique id.
     */
    #[JsonProperty('requirements'), ArrayType([SimulationOnboardingRequirementDto::class])]
    public array $requirements;

    /**
     * @param array{
     *   assistantId: string,
     *   idempotencyKey: string,
     *   requirements: array<SimulationOnboardingRequirementDto>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistantId = $values['assistantId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->requirements = $values['requirements'];
    }
}
