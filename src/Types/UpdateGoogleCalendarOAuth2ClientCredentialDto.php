<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class UpdateGoogleCalendarOAuth2ClientCredentialDto extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateGoogleCalendarOAuth2ClientCredentialDtoProvider> $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   provider?: ?value-of<UpdateGoogleCalendarOAuth2ClientCredentialDtoProvider>,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->provider = $values['provider'] ?? null;
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
