<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class UpdateEmailCredentialDto extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateEmailCredentialDtoProvider> $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $email The recipient email address for alerts
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   provider?: ?value-of<UpdateEmailCredentialDtoProvider>,
     *   email?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->provider = $values['provider'] ?? null;
        $this->email = $values['email'] ?? null;
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
