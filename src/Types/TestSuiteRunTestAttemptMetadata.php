<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TestSuiteRunTestAttemptMetadata extends JsonSerializableType
{
    /**
     * @var string $sessionId This is the session ID for the test attempt.
     */
    #[JsonProperty('sessionId')]
    public string $sessionId;

    /**
     * @param array{
     *   sessionId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sessionId = $values['sessionId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
