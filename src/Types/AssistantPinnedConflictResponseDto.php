<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AssistantPinnedConflictResponseDto extends JsonSerializableType
{
    /**
     * @var value-of<AssistantPinnedConflictResponseDtoError> $error
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @var string $message Human-readable reason the parent-assistant delete was rejected.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @param array{
     *   error: value-of<AssistantPinnedConflictResponseDtoError>,
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
