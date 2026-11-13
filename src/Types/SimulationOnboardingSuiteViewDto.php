<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SimulationOnboardingSuiteViewDto extends JsonSerializableType
{
    /**
     * @var SimulationOnboardingSuiteRefDto $suite The generated simulation suite id and name.
     */
    #[JsonProperty('suite')]
    public SimulationOnboardingSuiteRefDto $suite;

    /**
     * @var string $assistantId Assistant the suite is assigned to.
     */
    #[JsonProperty('assistantId')]
    public string $assistantId;

    /**
     * @var array<SimulationOnboardingSuiteSimulationDto> $simulations The suite's simulations, in order.
     */
    #[JsonProperty('simulations'), ArrayType([SimulationOnboardingSuiteSimulationDto::class])]
    public array $simulations;

    /**
     * @var SimulationOnboardingSuiteCoverageDto $coverage Counts of covered and total requirements, uncovered requirements, and scenarios available to retry.
     */
    #[JsonProperty('coverage')]
    public SimulationOnboardingSuiteCoverageDto $coverage;

    /**
     * @var array<SimulationOnboardingRequirementDto> $requirements The test requirements used to generate the suite. Match their ids to `coverage.gaps` to identify uncovered requirements.
     */
    #[JsonProperty('requirements'), ArrayType([SimulationOnboardingRequirementDto::class])]
    public array $requirements;

    /**
     * @var SimulationOnboardingSuiteDocsDto $docs Links to simulation testing best practices and tool mocking documentation.
     */
    #[JsonProperty('docs')]
    public SimulationOnboardingSuiteDocsDto $docs;

    /**
     * @var bool $reused True when the request matched one already applied (same `idempotencyKey` or `patchKey`) and nothing changed.
     */
    #[JsonProperty('reused')]
    public bool $reused;

    /**
     * @var ?array<string> $failedEditSimulationIds Simulations an edit asked to rewrite that were not rewritten, for example because the rewrite did not generate in time. Retry them with a new `patchKey`.
     */
    #[JsonProperty('failedEditSimulationIds'), ArrayType(['string'])]
    public ?array $failedEditSimulationIds;

    /**
     * @var ?array<SimulationOnboardingToolGapDto> $toolGaps Tool paths the suite's simulations do not exercise as configured, such as a tool mocked although it runs natively. Omitted when there are none.
     */
    #[JsonProperty('toolGaps'), ArrayType([SimulationOnboardingToolGapDto::class])]
    public ?array $toolGaps;

    /**
     * @param array{
     *   suite: SimulationOnboardingSuiteRefDto,
     *   assistantId: string,
     *   simulations: array<SimulationOnboardingSuiteSimulationDto>,
     *   coverage: SimulationOnboardingSuiteCoverageDto,
     *   requirements: array<SimulationOnboardingRequirementDto>,
     *   docs: SimulationOnboardingSuiteDocsDto,
     *   reused: bool,
     *   failedEditSimulationIds?: ?array<string>,
     *   toolGaps?: ?array<SimulationOnboardingToolGapDto>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->suite = $values['suite'];
        $this->assistantId = $values['assistantId'];
        $this->simulations = $values['simulations'];
        $this->coverage = $values['coverage'];
        $this->requirements = $values['requirements'];
        $this->docs = $values['docs'];
        $this->reused = $values['reused'];
        $this->failedEditSimulationIds = $values['failedEditSimulationIds'] ?? null;
        $this->toolGaps = $values['toolGaps'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
