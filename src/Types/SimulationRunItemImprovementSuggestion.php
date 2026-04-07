<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationRunItemImprovementSuggestion extends JsonSerializableType
{
    /**
     * @var string $issue This is the issue identified.
     */
    #[JsonProperty('issue')]
    public string $issue;

    /**
     * @var string $suggestion This is the suggested improvement.
     */
    #[JsonProperty('suggestion')]
    public string $suggestion;

    /**
     * @param array{
     *   issue: string,
     *   suggestion: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->issue = $values['issue'];
        $this->suggestion = $values['suggestion'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
