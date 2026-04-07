<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AwsStsAuthenticationArtifact extends JsonSerializableType
{
    /**
     * @var string $externalId This is the optional external ID for the AWS credential
     */
    #[JsonProperty('externalId')]
    public string $externalId;

    /**
     * @param array{
     *   externalId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalId = $values['externalId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
