<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class GenerateScenariosResponse extends JsonSerializableType
{
    /**
     * @var array<GeneratedScenario> $scenarios Generated scenarios
     */
    #[JsonProperty('scenarios'), ArrayType([GeneratedScenario::class])]
    public array $scenarios;

    /**
     * @var string $coverageNotes Summary of test coverage
     */
    #[JsonProperty('coverageNotes')]
    public string $coverageNotes;

    /**
     * @param array{
     *   scenarios: array<GeneratedScenario>,
     *   coverageNotes: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->scenarios = $values['scenarios'];
        $this->coverageNotes = $values['coverageNotes'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
