<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationOnboardingSuiteDocsDto extends JsonSerializableType
{
    /**
     * @var string $bestPractices Link to testing best practices.
     */
    #[JsonProperty('bestPractices')]
    public string $bestPractices;

    /**
     * @var string $toolMocks Link explaining why tools are mocked by default.
     */
    #[JsonProperty('toolMocks')]
    public string $toolMocks;

    /**
     * @param array{
     *   bestPractices: string,
     *   toolMocks: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->bestPractices = $values['bestPractices'];
        $this->toolMocks = $values['toolMocks'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
