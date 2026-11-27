<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class GuardrailRuleImpact extends JsonSerializableType
{
    /**
     * @var array<string> $assistantIds Distinct assistants affected across direct, pack, draft, and version selections.
     */
    #[JsonProperty('assistantIds'), ArrayType(['string'])]
    public array $assistantIds;

    /**
     * @var array<string> $packIds Packs currently containing the rule.
     */
    #[JsonProperty('packIds'), ArrayType(['string'])]
    public array $packIds;

    /**
     * @var array<GuardrailRuleUsage> $assistants Names for the same distinct assistant identities.
     */
    #[JsonProperty('assistants'), ArrayType([GuardrailRuleUsage::class])]
    public array $assistants;

    /**
     * @var array<GuardrailRuleUsage> $packs Names for the containing pack identities.
     */
    #[JsonProperty('packs'), ArrayType([GuardrailRuleUsage::class])]
    public array $packs;

    /**
     * @param array{
     *   assistantIds: array<string>,
     *   packIds: array<string>,
     *   assistants: array<GuardrailRuleUsage>,
     *   packs: array<GuardrailRuleUsage>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistantIds = $values['assistantIds'];
        $this->packIds = $values['packIds'];
        $this->assistants = $values['assistants'];
        $this->packs = $values['packs'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
