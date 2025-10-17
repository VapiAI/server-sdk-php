<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TestSuiteRunTestAttemptCall extends JsonSerializableType
{
    /**
     * @var Artifact $artifact This is the artifact of the call.
     */
    #[JsonProperty('artifact')]
    public Artifact $artifact;

    /**
     * @param array{
     *   artifact: Artifact,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->artifact = $values['artifact'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
