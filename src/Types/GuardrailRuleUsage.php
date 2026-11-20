<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class GuardrailRuleUsage extends JsonSerializableType
{
    /**
     * @var string $id Stable identity of an affected assistant or containing pack.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name Current display name, with an untitled fallback for assistants.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
