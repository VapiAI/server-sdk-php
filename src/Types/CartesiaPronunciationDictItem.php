<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CartesiaPronunciationDictItem extends JsonSerializableType
{
    /**
     * @var string $text The text to be replaced in pronunciation
     */
    #[JsonProperty('text')]
    public string $text;

    /**
     * The pronunciation alias or IPA representation
     * Can be a "sounds-like" guidance (e.g., "VAH-pee") or IPA notation (e.g., "<<ˈ|v|ɑ|ˈ|p|i>>")
     *
     * @var string $alias
     */
    #[JsonProperty('alias')]
    public string $alias;

    /**
     * @param array{
     *   text: string,
     *   alias: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->text = $values['text'];
        $this->alias = $values['alias'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
