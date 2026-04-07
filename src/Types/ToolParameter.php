<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Union;

class ToolParameter extends JsonSerializableType
{
    /**
     * @var string $key This is the key of the parameter.
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var (
     *    string
     *   |float
     *   |bool
     *   |array<string, mixed>
     *   |array<mixed>
     * ) $value The value of the parameter. Any JSON type. String values support Liquid templates.
     */
    #[JsonProperty('value'), Union('string', 'float', 'bool', ['string' => 'mixed'], ['mixed'])]
    public string|float|bool|array $value;

    /**
     * @param array{
     *   key: string,
     *   value: (
     *    string
     *   |float
     *   |bool
     *   |array<string, mixed>
     *   |array<mixed>
     * ),
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'];
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
