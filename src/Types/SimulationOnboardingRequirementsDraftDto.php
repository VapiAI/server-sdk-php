<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SimulationOnboardingRequirementsDraftDto extends JsonSerializableType
{
    /**
     * @var float $version Draft version, 1 for a first draft.
     */
    #[JsonProperty('version')]
    public float $version;

    /**
     * @var ?string $changeNote What changed since the previous draft.
     */
    #[JsonProperty('changeNote')]
    public ?string $changeNote;

    /**
     * @var array<string> $sources What the draft was based on, e.g. the prompt and tools.
     */
    #[JsonProperty('sources'), ArrayType(['string'])]
    public array $sources;

    /**
     * @var array<SimulationOnboardingRequirementDto> $requirements Draft test requirements describing the expected assistant behavior. Review and refine these before generating a simulation suite.
     */
    #[JsonProperty('requirements'), ArrayType([SimulationOnboardingRequirementDto::class])]
    public array $requirements;

    /**
     * @var array<SimulationOnboardingOpenQuestionDto> $openQuestions Questions about ambiguous or missing assistant behavior to resolve before generating a simulation suite.
     */
    #[JsonProperty('openQuestions'), ArrayType([SimulationOnboardingOpenQuestionDto::class])]
    public array $openQuestions;

    /**
     * @param array{
     *   version: float,
     *   sources: array<string>,
     *   requirements: array<SimulationOnboardingRequirementDto>,
     *   openQuestions: array<SimulationOnboardingOpenQuestionDto>,
     *   changeNote?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->version = $values['version'];
        $this->changeNote = $values['changeNote'] ?? null;
        $this->sources = $values['sources'];
        $this->requirements = $values['requirements'];
        $this->openQuestions = $values['openQuestions'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
