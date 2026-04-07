<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CartesiaPronunciationDictionary extends JsonSerializableType
{
    /**
     * @var string $id Unique identifier for the pronunciation dictionary
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name Name of the pronunciation dictionary
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $ownerId ID of the user who owns this dictionary
     */
    #[JsonProperty('ownerId')]
    public string $ownerId;

    /**
     * @var bool $pinned Whether this dictionary is pinned for the user
     */
    #[JsonProperty('pinned')]
    public bool $pinned;

    /**
     * @var array<CartesiaPronunciationDictItem> $items List of text-to-pronunciation mappings
     */
    #[JsonProperty('items'), ArrayType([CartesiaPronunciationDictItem::class])]
    public array $items;

    /**
     * @var string $createdAt ISO 8601 timestamp of when the dictionary was created
     */
    #[JsonProperty('createdAt')]
    public string $createdAt;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   ownerId: string,
     *   pinned: bool,
     *   items: array<CartesiaPronunciationDictItem>,
     *   createdAt: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->ownerId = $values['ownerId'];
        $this->pinned = $values['pinned'];
        $this->items = $values['items'];
        $this->createdAt = $values['createdAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
