<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Credentials for authenticating telephony requests with Twilio using an account SID and either an auth token or API key credentials.
 */
class CreateTwilioCredentialDto extends JsonSerializableType
{
    /**
     * @var ?string $authToken This is not returned in the API.
     */
    #[JsonProperty('authToken')]
    public ?string $authToken;

    /**
     * @var ?string $apiKey This is not returned in the API.
     */
    #[JsonProperty('apiKey')]
    public ?string $apiKey;

    /**
     * @var ?string $apiSecret This is not returned in the API.
     */
    #[JsonProperty('apiSecret')]
    public ?string $apiSecret;

    /**
     * @var string $accountSid Twilio Account SID associated with the credential.
     */
    #[JsonProperty('accountSid')]
    public string $accountSid;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   accountSid: string,
     *   authToken?: ?string,
     *   apiKey?: ?string,
     *   apiSecret?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->authToken = $values['authToken'] ?? null;
        $this->apiKey = $values['apiKey'] ?? null;
        $this->apiSecret = $values['apiSecret'] ?? null;
        $this->accountSid = $values['accountSid'];
        $this->name = $values['name'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
