<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class PersonalityInUseConflictResponseDto extends JsonSerializableType
{
    /**
     * @var value-of<PersonalityInUseConflictResponseDtoError> $error
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @var string $message Human-readable reason the personality cannot be deleted.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @param array{
     *   error: value-of<PersonalityInUseConflictResponseDtoError>,
     *   message: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
        $this->message = $values['message'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
