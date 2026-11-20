<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ModelCostServiceTierBreakdown extends JsonSerializableType
{
    /**
     * @var ?string $serviceTier This is the service tier OpenAI reported serving a request that asked for Fast mode, in Vapi's names: `fast` when Fast mode was served, otherwise the tier served, such as `default`. It is absent on the row for usage with no reported tier: requests that did not ask for Fast mode, requests that ended before OpenAI reported a tier, and other providers.
     */
    #[JsonProperty('serviceTier')]
    public ?string $serviceTier;

    /**
     * @var float $cost This is the cost in USD of the usage at this tier, rounded to 8 decimal places.
     */
    #[JsonProperty('cost')]
    public float $cost;

    /**
     * @var float $promptTokens This is the number of prompt tokens used at this tier.
     */
    #[JsonProperty('promptTokens')]
    public float $promptTokens;

    /**
     * @var float $completionTokens This is the number of completion tokens generated at this tier.
     */
    #[JsonProperty('completionTokens')]
    public float $completionTokens;

    /**
     * @var ?float $cachedPromptTokens This is the number of cached prompt tokens used at this tier. This is a subset of `promptTokens`, not an addition to it.
     */
    #[JsonProperty('cachedPromptTokens')]
    public ?float $cachedPromptTokens;

    /**
     * @var ?float $reasoningTokens This is the number of reasoning tokens generated at this tier. This is a subset of `completionTokens`, not an addition to it.
     */
    #[JsonProperty('reasoningTokens')]
    public ?float $reasoningTokens;

    /**
     * @param array{
     *   cost: float,
     *   promptTokens: float,
     *   completionTokens: float,
     *   serviceTier?: ?string,
     *   cachedPromptTokens?: ?float,
     *   reasoningTokens?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serviceTier = $values['serviceTier'] ?? null;
        $this->cost = $values['cost'];
        $this->promptTokens = $values['promptTokens'];
        $this->completionTokens = $values['completionTokens'];
        $this->cachedPromptTokens = $values['cachedPromptTokens'] ?? null;
        $this->reasoningTokens = $values['reasoningTokens'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
