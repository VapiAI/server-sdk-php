<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AwsStsAuthenticationPlan extends JsonSerializableType
{
    /**
     * @var string $roleArn This is the role ARN for the AWS credential
     */
    #[JsonProperty('roleArn')]
    public string $roleArn;

    /**
     * @var ?string $externalId Optional external ID for additional security in the role trust policy.
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @param array{
     *   roleArn: string,
     *   externalId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->roleArn = $values['roleArn'];
        $this->externalId = $values['externalId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
