<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class GeneratedScenario extends JsonSerializableType
{
    /**
     * @var string $name Short descriptive name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $instructions Instructions for the tester
     */
    #[JsonProperty('instructions')]
    public string $instructions;

    /**
     * @var value-of<GeneratedScenarioCategory> $category Scenario category
     */
    #[JsonProperty('category')]
    public string $category;

    /**
     * @var string $reasoning Why this scenario is valuable
     */
    #[JsonProperty('reasoning')]
    public string $reasoning;

    /**
     * @param array{
     *   name: string,
     *   instructions: string,
     *   category: value-of<GeneratedScenarioCategory>,
     *   reasoning: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->instructions = $values['instructions'];
        $this->category = $values['category'];
        $this->reasoning = $values['reasoning'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
