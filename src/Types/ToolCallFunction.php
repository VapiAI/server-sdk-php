<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ToolCallFunction extends JsonSerializableType
{
    /**
     * @var string $arguments This is the arguments to call the function with
     */
    #[JsonProperty('arguments')]
    public string $arguments;

    /**
     * @var string $name This is the name of the function to call
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @param array{
     *   arguments: string,
     *   name: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->arguments = $values['arguments'];
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
