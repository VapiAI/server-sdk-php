<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class UpdateToolVersionMetadataDto extends JsonSerializableType
{
    /**
     * @var ?string $versionName Optional human-readable label for this version. Pass `null` to clear.
     */
    #[JsonProperty('versionName')]
    public ?string $versionName;

    /**
     * @var ?string $versionDescription Optional description for this version. Pass `null` to clear.
     */
    #[JsonProperty('versionDescription')]
    public ?string $versionDescription;

    /**
     * @param array{
     *   versionName?: ?string,
     *   versionDescription?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->versionName = $values['versionName'] ?? null;
        $this->versionDescription = $values['versionDescription'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
