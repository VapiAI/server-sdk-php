<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CreateCustomCredentialDto extends JsonSerializableType
{
    /**
     * @var CreateCustomCredentialDtoAuthenticationPlan $authenticationPlan This is the authentication plan. Supports OAuth2 RFC 6749, HMAC signing, and Bearer authentication.
     */
    #[JsonProperty('authenticationPlan')]
    public CreateCustomCredentialDtoAuthenticationPlan $authenticationPlan;

    /**
     * @var ?CreateCustomCredentialDtoEncryptionPlan $encryptionPlan This is the encryption plan for encrypting sensitive data. Currently supports public-key encryption.
     */
    #[JsonProperty('encryptionPlan')]
    public ?CreateCustomCredentialDtoEncryptionPlan $encryptionPlan;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   authenticationPlan: CreateCustomCredentialDtoAuthenticationPlan,
     *   encryptionPlan?: ?CreateCustomCredentialDtoEncryptionPlan,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->authenticationPlan = $values['authenticationPlan'];
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
