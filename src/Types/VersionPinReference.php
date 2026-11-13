<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class VersionPinReference extends JsonSerializableType
{
    /**
     * @var value-of<VersionPinReferenceSourceType> $sourceType Kind of source row the pin originates from.
     */
    #[JsonProperty('sourceType')]
    public string $sourceType;

    /**
     * @var string $sourceId UUID of the source row (polymorphic, not FK-enforced).
     */
    #[JsonProperty('sourceId')]
    public string $sourceId;

    /**
     * @param array{
     *   sourceType: value-of<VersionPinReferenceSourceType>,
     *   sourceId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sourceType = $values['sourceType'];
        $this->sourceId = $values['sourceId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
