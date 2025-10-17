<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AnthropicThinkingConfig extends JsonSerializableType
{
    /**
     * @var 'enabled' $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * The maximum number of tokens to allocate for thinking.
     * Must be between 1024 and 100000 tokens.
     *
     * @var float $budgetTokens
     */
    #[JsonProperty('budgetTokens')]
    public float $budgetTokens;

    /**
     * @param array{
     *   type: 'enabled',
     *   budgetTokens: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->budgetTokens = $values['budgetTokens'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
