<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AssistantPinnedConflictResponseDto extends JsonSerializableType
{
    /**
     * @var string $message Human-readable reason the parent-assistant delete was rejected.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @param array{
     *   message: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
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
