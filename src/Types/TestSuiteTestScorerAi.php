<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TestSuiteTestScorerAi extends JsonSerializableType
{
    /**
     * @var value-of<TestSuiteTestScorerAiType> $type This is the type of the scorer, which must be AI.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $rubric This is the rubric used by the AI scorer.
     */
    #[JsonProperty('rubric')]
    public string $rubric;

    /**
     * @param array{
     *   type: value-of<TestSuiteTestScorerAiType>,
     *   rubric: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->rubric = $values['rubric'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
