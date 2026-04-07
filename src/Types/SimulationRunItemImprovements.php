<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SimulationRunItemImprovements extends JsonSerializableType
{
    /**
     * @var string $analysis This is a summary analysis of why evaluations failed.
     */
    #[JsonProperty('analysis')]
    public string $analysis;

    /**
     * @var array<SimulationRunItemImprovementSuggestion> $systemPromptSuggestions This is the list of suggestions for improving the system prompt.
     */
    #[JsonProperty('systemPromptSuggestions'), ArrayType([SimulationRunItemImprovementSuggestion::class])]
    public array $systemPromptSuggestions;

    /**
     * @var array<SimulationRunItemImprovementSuggestion> $toolSuggestions This is the list of suggestions for improving tools.
     */
    #[JsonProperty('toolSuggestions'), ArrayType([SimulationRunItemImprovementSuggestion::class])]
    public array $toolSuggestions;

    /**
     * @var array<SimulationRunItemImprovementSuggestion> $scenarioSuggestions This is the list of suggestions for improving the scenario/evaluation plan.
     */
    #[JsonProperty('scenarioSuggestions'), ArrayType([SimulationRunItemImprovementSuggestion::class])]
    public array $scenarioSuggestions;

    /**
     * @var ?string $suggestedSystemPrompt This is a complete revised system prompt if major changes are needed.
     */
    #[JsonProperty('suggestedSystemPrompt')]
    public ?string $suggestedSystemPrompt;

    /**
     * @param array{
     *   analysis: string,
     *   systemPromptSuggestions: array<SimulationRunItemImprovementSuggestion>,
     *   toolSuggestions: array<SimulationRunItemImprovementSuggestion>,
     *   scenarioSuggestions: array<SimulationRunItemImprovementSuggestion>,
     *   suggestedSystemPrompt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->analysis = $values['analysis'];
        $this->systemPromptSuggestions = $values['systemPromptSuggestions'];
        $this->toolSuggestions = $values['toolSuggestions'];
        $this->scenarioSuggestions = $values['scenarioSuggestions'];
        $this->suggestedSystemPrompt = $values['suggestedSystemPrompt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
