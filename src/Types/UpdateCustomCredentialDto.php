<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class UpdateCustomCredentialDto extends JsonSerializableType
{
    /**
     * @var ?UpdateCustomCredentialDtoAuthenticationPlan $authenticationPlan This is the authentication plan. Supports OAuth2 RFC 6749, HMAC signing, and Bearer authentication.
     */
    #[JsonProperty('authenticationPlan')]
    public ?UpdateCustomCredentialDtoAuthenticationPlan $authenticationPlan;

    /**
     * @var ?UpdateCustomCredentialDtoEncryptionPlan $encryptionPlan This is the encryption plan for encrypting sensitive data. Currently supports public-key encryption.
     */
    #[JsonProperty('encryptionPlan')]
    public ?UpdateCustomCredentialDtoEncryptionPlan $encryptionPlan;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   authenticationPlan?: ?UpdateCustomCredentialDtoAuthenticationPlan,
     *   encryptionPlan?: ?UpdateCustomCredentialDtoEncryptionPlan,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->authenticationPlan = $values['authenticationPlan'] ?? null;
        $this->encryptionPlan = $values['encryptionPlan'] ?? null;
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
