<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class UpdateLangfuseCredentialDto extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateLangfuseCredentialDtoProvider> $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $publicKey The public key for Langfuse project. Eg: pk-lf-...
     */
    #[JsonProperty('publicKey')]
    public ?string $publicKey;

    /**
     * @var ?string $apiKey The secret key for Langfuse project. Eg: sk-lf-... .This is not returned in the API.
     */
    #[JsonProperty('apiKey')]
    public ?string $apiKey;

    /**
     * @var ?string $apiUrl The host URL for Langfuse project. Eg: https://cloud.langfuse.com
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
     *   provider?: ?value-of<UpdateLangfuseCredentialDtoProvider>,
     *   publicKey?: ?string,
     *   apiKey?: ?string,
     *   apiUrl?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->provider = $values['provider'] ?? null;
        $this->publicKey = $values['publicKey'] ?? null;
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
