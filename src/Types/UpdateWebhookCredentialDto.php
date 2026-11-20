<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class UpdateWebhookCredentialDto extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateWebhookCredentialDtoProvider> $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?UpdateWebhookCredentialDtoAuthenticationPlan $authenticationPlan This is the authentication plan. Supports OAuth2 RFC 6749, HMAC signing, and Bearer authentication.
     */
    #[JsonProperty('authenticationPlan')]
    public ?UpdateWebhookCredentialDtoAuthenticationPlan $authenticationPlan;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   provider?: ?value-of<UpdateWebhookCredentialDtoProvider>,
     *   authenticationPlan?: ?UpdateWebhookCredentialDtoAuthenticationPlan,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->provider = $values['provider'] ?? null;
        $this->authenticationPlan = $values['authenticationPlan'] ?? null;
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
