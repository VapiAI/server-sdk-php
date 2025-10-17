<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class UpdateGoogleCalendarOAuth2AuthorizationCredentialDto extends JsonSerializableType
{
    /**
     * @var ?string $authorizationId The authorization ID for the OAuth2 authorization
     */
    #[JsonProperty('authorizationId')]
    public ?string $authorizationId;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   authorizationId?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->authorizationId = $values['authorizationId'] ?? null;
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
