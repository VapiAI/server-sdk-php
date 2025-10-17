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
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   authenticationPlan: CreateCustomCredentialDtoAuthenticationPlan,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->authenticationPlan = $values['authenticationPlan'];
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
