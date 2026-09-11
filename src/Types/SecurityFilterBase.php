<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;

/**
 * Base configuration for a security filter applied to transcripts before model processing.
 */
class SecurityFilterBase extends JsonSerializableType
{
    /**
     * @param array{
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        unset($values);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
