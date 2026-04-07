<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AwsStsAuthenticationSession extends JsonSerializableType
{
    /**
     * @var ?AwsStsAssumeRoleUser $assumedRoleUser This is the assumed role user
     */
    #[JsonProperty('assumedRoleUser')]
    public ?AwsStsAssumeRoleUser $assumedRoleUser;

    /**
     * @var ?AwsStsCredentials $credentials This is the credentials for the AWS STS assume role
     */
    #[JsonProperty('credentials')]
    public ?AwsStsCredentials $credentials;

    /**
     * @var ?float $packedPolicySize This is the size of the policy
     */
    #[JsonProperty('packedPolicySize')]
    public ?float $packedPolicySize;

    /**
     * @var ?string $sourcedIdEntity This is the sourced ID entity
     */
    #[JsonProperty('sourcedIDEntity')]
    public ?string $sourcedIdEntity;

    /**
     * @param array{
     *   assumedRoleUser?: ?AwsStsAssumeRoleUser,
     *   credentials?: ?AwsStsCredentials,
     *   packedPolicySize?: ?float,
     *   sourcedIdEntity?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->assumedRoleUser = $values['assumedRoleUser'] ?? null;
        $this->credentials = $values['credentials'] ?? null;
        $this->packedPolicySize = $values['packedPolicySize'] ?? null;
        $this->sourcedIdEntity = $values['sourcedIdEntity'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
