<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TrafficAllocationVersionConflictResponseDto extends JsonSerializableType
{
    /**
     * @var value-of<TrafficAllocationVersionConflictResponseDtoError> $error
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @var string $message Human-readable reason the delete was rejected.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var string $governingAllocationId The allocation currently using this version. Create a new allocation without it before deleting the version.
     */
    #[JsonProperty('governingAllocationId')]
    public string $governingAllocationId;

    /**
     * @param array{
     *   error: value-of<TrafficAllocationVersionConflictResponseDtoError>,
     *   message: string,
     *   governingAllocationId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
        $this->message = $values['message'];
        $this->governingAllocationId = $values['governingAllocationId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
