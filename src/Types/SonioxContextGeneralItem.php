<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SonioxContextGeneralItem extends JsonSerializableType
{
    /**
     * @var string $key The key describing the type of context (e.g., "domain", "topic", "doctor", "organization").
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var string $value The value for the context key (e.g., "Healthcare", "Diabetes management consultation").
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   key: string,
     *   value: string,
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
