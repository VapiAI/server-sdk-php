<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class UpdateGoogleCredentialDto extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateGoogleCredentialDtoProvider> $provider This is the key for Gemini in Google AI Studio. Get it from here: https://aistudio.google.com/app/apikey
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
     * @param array{
     *   provider?: ?value-of<UpdateGoogleCredentialDtoProvider>,
     *   apiKey?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->provider = $values['provider'] ?? null;
        $this->apiKey = $values['apiKey'] ?? null;
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
