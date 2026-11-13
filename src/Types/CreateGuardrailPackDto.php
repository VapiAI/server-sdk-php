<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CreateGuardrailPackDto extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var array<string> $ruleIds Projected from membership rows; a supplied array replaces membership.
     */
    #[JsonProperty('ruleIds'), ArrayType(['string'])]
    public array $ruleIds;

    /**
     * @param array{
     *   name: string,
     *   ruleIds: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->ruleIds = $values['ruleIds'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
