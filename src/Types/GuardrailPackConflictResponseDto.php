<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class GuardrailPackConflictResponseDto extends JsonSerializableType
{
    /**
     * @var value-of<GuardrailPackConflictResponseDtoError> $error Machine-readable cause; clients branch on this, never on `message`.
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @var string $message Sentence-case copy safe to show the user.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @param array{
     *   error: value-of<GuardrailPackConflictResponseDtoError>,
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
