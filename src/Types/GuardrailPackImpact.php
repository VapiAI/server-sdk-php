<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class GuardrailPackImpact extends JsonSerializableType
{
    /**
     * @var array<string> $assistantIds
     */
    #[JsonProperty('assistantIds'), ArrayType(['string'])]
    public array $assistantIds;

    /**
     * @param array{
     *   assistantIds: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistantIds = $values['assistantIds'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
