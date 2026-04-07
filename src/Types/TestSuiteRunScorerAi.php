<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TestSuiteRunScorerAi extends JsonSerializableType
{
    /**
     * @var value-of<TestSuiteRunScorerAiType> $type This is the type of the scorer, which must be AI.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var value-of<TestSuiteRunScorerAiResult> $result This is the result of the test suite.
     */
    #[JsonProperty('result')]
    public string $result;

    /**
     * @var string $reasoning This is the reasoning provided by the AI scorer.
     */
    #[JsonProperty('reasoning')]
    public string $reasoning;

    /**
     * @var string $rubric This is the rubric used by the AI scorer.
     */
    #[JsonProperty('rubric')]
    public string $rubric;

    /**
     * @param array{
     *   type: value-of<TestSuiteRunScorerAiType>,
     *   result: value-of<TestSuiteRunScorerAiResult>,
     *   reasoning: string,
     *   rubric: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->result = $values['result'];
        $this->reasoning = $values['reasoning'];
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
