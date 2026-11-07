<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class UpdateVoiceLibraryMetadataDto extends JsonSerializableType
{
    /**
     * @var ?string $name Updated display name for the voice.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $description Updated description for the voice.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @param array{
     *   name?: ?string,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->description = $values['description'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
