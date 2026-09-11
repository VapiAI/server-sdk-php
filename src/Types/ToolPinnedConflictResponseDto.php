<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ToolPinnedConflictResponseDto extends JsonSerializableType
{
    /**
     * @var value-of<ToolPinnedConflictResponseDtoError> $error
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @var string $message Human-readable reason the parent-tool delete was rejected.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @param array{
     *   error: value-of<ToolPinnedConflictResponseDtoError>,
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
