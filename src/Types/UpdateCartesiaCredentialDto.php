<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class UpdateCartesiaCredentialDto extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateCartesiaCredentialDtoProvider> $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $apiKey This is not returned in the API.
     */
    #[JsonProperty('apiKey')]
    public ?string $apiKey;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $apiUrl This can be used to point to an onprem Cartesia instance. Defaults to api.cartesia.ai.
     */
    #[JsonProperty('apiUrl')]
    public ?string $apiUrl;

    /**
     * @param array{
     *   provider?: ?value-of<UpdateCartesiaCredentialDtoProvider>,
     *   apiKey?: ?string,
     *   name?: ?string,
     *   apiUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->provider = $values['provider'] ?? null;
        $this->apiKey = $values['apiKey'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->apiUrl = $values['apiUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
