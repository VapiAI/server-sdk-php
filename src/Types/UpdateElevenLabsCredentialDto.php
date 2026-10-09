<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class UpdateElevenLabsCredentialDto extends JsonSerializableType
{
    /**
     * @var ?'11labs' $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $apiKey This is not returned in the API.
     */
    #[JsonProperty('apiKey')]
    public ?string $apiKey;

    /**
     * @var ?value-of<UpdateElevenLabsCredentialDtoApiUrl> $apiUrl ElevenLabs-only API environment for this key: the global endpoint or the EU data residency endpoint. In EU deployments, new credentials must explicitly use the EU data residency endpoint; existing credentials may omit this field on update to retain their saved endpoint. Outside EU deployments, Vapi detects an omitted endpoint automatically and null on update clears and re-detects the endpoint.
     */
    #[JsonProperty('apiUrl')]
    public ?string $apiUrl;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   provider?: ?'11labs',
     *   apiKey?: ?string,
     *   apiUrl?: ?value-of<UpdateElevenLabsCredentialDtoApiUrl>,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->provider = $values['provider'] ?? null;
        $this->apiKey = $values['apiKey'] ?? null;
        $this->apiUrl = $values['apiUrl'] ?? null;
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
