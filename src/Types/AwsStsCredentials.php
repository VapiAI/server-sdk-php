<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

class AwsStsCredentials extends JsonSerializableType
{
    /**
     * @var ?string $accessKeyId This is the access key ID for the AWS credential
     */
    #[JsonProperty('AccessKeyId')]
    public ?string $accessKeyId;

    /**
     * @var ?DateTime $expiration This is the expiration date for the AWS credential
     */
    #[JsonProperty('Expiration'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $expiration;

    /**
     * @var ?string $secretAccessKey This is the secret access key for the AWS credential
     */
    #[JsonProperty('SecretAccessKey')]
    public ?string $secretAccessKey;

    /**
     * @var ?string $sessionToken This is the session token for the AWS credential
     */
    #[JsonProperty('SessionToken')]
    public ?string $sessionToken;

    /**
     * @param array{
     *   accessKeyId?: ?string,
     *   expiration?: ?DateTime,
     *   secretAccessKey?: ?string,
     *   sessionToken?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accessKeyId = $values['accessKeyId'] ?? null;
        $this->expiration = $values['expiration'] ?? null;
        $this->secretAccessKey = $values['secretAccessKey'] ?? null;
        $this->sessionToken = $values['sessionToken'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
