<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CodeToolEnvironmentVariable extends JsonSerializableType
{
    /**
     * @var string $name Name of the environment variable
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $value Value of the environment variable. Supports Liquid templates.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   name: string,
     *   value: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
