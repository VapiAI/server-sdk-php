<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AwsiamCredentialsAuthenticationPlan extends JsonSerializableType
{
    /**
     * @var string $awsAccessKeyId AWS Access Key ID. This is not returned in the API.
     */
    #[JsonProperty('awsAccessKeyId')]
    public string $awsAccessKeyId;

    /**
     * @var string $awsSecretAccessKey AWS Secret Access Key. This is not returned in the API.
     */
    #[JsonProperty('awsSecretAccessKey')]
    public string $awsSecretAccessKey;

    /**
     * @param array{
     *   awsAccessKeyId: string,
     *   awsSecretAccessKey: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->awsAccessKeyId = $values['awsAccessKeyId'];
        $this->awsSecretAccessKey = $values['awsSecretAccessKey'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
