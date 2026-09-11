<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class VersionPinConflictResponseDto extends JsonSerializableType
{
    /**
     * @var value-of<VersionPinConflictResponseDtoError> $error
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @var string $message Human-readable reason the delete was rejected.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var array<VersionPinReference> $pinnedBy Pins that block the delete.
     */
    #[JsonProperty('pinnedBy'), ArrayType([VersionPinReference::class])]
    public array $pinnedBy;

    /**
     * @param array{
     *   error: value-of<VersionPinConflictResponseDtoError>,
     *   message: string,
     *   pinnedBy: array<VersionPinReference>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
        $this->message = $values['message'];
        $this->pinnedBy = $values['pinnedBy'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
