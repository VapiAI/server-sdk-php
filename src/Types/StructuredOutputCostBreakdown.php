<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class StructuredOutputCostBreakdown extends JsonSerializableType
{
    /**
     * @var string $structuredOutputId This is the unique identifier of the structured output that produced this cost.
     */
    #[JsonProperty('structuredOutputId')]
    public string $structuredOutputId;

    /**
     * @var string $name This is the name of the structured output, so this breakdown is readable without looking the id up.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var float $cost This is the cost in USD of evaluating this structured output.
     */
    #[JsonProperty('cost')]
    public float $cost;

    /**
     * @var float $promptTokens This is the number of prompt tokens used to evaluate this structured output.
     */
    #[JsonProperty('promptTokens')]
    public float $promptTokens;

    /**
     * @var float $completionTokens This is the number of completion tokens generated for this structured output.
     */
    #[JsonProperty('completionTokens')]
    public float $completionTokens;

    /**
     * @var ?float $cachedPromptTokens This is the number of cached prompt tokens used to evaluate this structured output. This is a subset of `promptTokens`, not an addition to it.
     */
    #[JsonProperty('cachedPromptTokens')]
    public ?float $cachedPromptTokens;

    /**
     * @param array{
     *   structuredOutputId: string,
     *   name: string,
     *   cost: float,
     *   promptTokens: float,
     *   completionTokens: float,
     *   cachedPromptTokens?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->structuredOutputId = $values['structuredOutputId'];
        $this->name = $values['name'];
        $this->cost = $values['cost'];
        $this->promptTokens = $values['promptTokens'];
        $this->completionTokens = $values['completionTokens'];
        $this->cachedPromptTokens = $values['cachedPromptTokens'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
