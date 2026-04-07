<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AwsStsAssumeRoleUser extends JsonSerializableType
{
    /**
     * @var ?string $assumedRoleId This is the assumed role ID
     */
    #[JsonProperty('AssumedRoleId')]
    public ?string $assumedRoleId;

    /**
     * @var ?string $arn This is the assumed role ARN
     */
    #[JsonProperty('Arn')]
    public ?string $arn;

    /**
     * @param array{
     *   assumedRoleId?: ?string,
     *   arn?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->assumedRoleId = $values['assumedRoleId'] ?? null;
        $this->arn = $values['arn'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
