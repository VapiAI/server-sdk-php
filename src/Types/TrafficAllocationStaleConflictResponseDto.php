<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TrafficAllocationStaleConflictResponseDto extends JsonSerializableType
{
    /**
     * @var value-of<TrafficAllocationStaleConflictResponseDtoError> $error
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @var string $message Human-readable reason the create was rejected.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var ?string $currentAllocationId The allocation currently in effect. Null if none exists yet.
     */
    #[JsonProperty('currentAllocationId')]
    public ?string $currentAllocationId;

    /**
     * @param array{
     *   error: value-of<TrafficAllocationStaleConflictResponseDtoError>,
     *   message: string,
     *   currentAllocationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
        $this->message = $values['message'];
        $this->currentAllocationId = $values['currentAllocationId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
