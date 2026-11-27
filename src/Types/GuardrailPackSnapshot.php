<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use DateTime;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Date;
use Vapi\Core\Types\ArrayType;

class GuardrailPackSnapshot extends JsonSerializableType
{
    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

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
     *   updatedAt: DateTime,
     *   name: string,
     *   ruleIds: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->updatedAt = $values['updatedAt'];
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
