<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class UpdateGoHighLevelMcpCredentialDto extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateGoHighLevelMcpCredentialDtoProvider> $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?Oauth2AuthenticationSession $authenticationSession This is the authentication session for the credential.
     */
    #[JsonProperty('authenticationSession')]
    public ?Oauth2AuthenticationSession $authenticationSession;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   provider?: ?value-of<UpdateGoHighLevelMcpCredentialDtoProvider>,
     *   authenticationSession?: ?Oauth2AuthenticationSession,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->provider = $values['provider'] ?? null;
        $this->authenticationSession = $values['authenticationSession'] ?? null;
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
