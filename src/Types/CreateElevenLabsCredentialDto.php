<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Credentials for authenticating speech recognition and voice synthesis requests with ElevenLabs.
 */
class CreateElevenLabsCredentialDto extends JsonSerializableType
{
    /**
     * @var string $apiKey This is not returned in the API.
     */
    #[JsonProperty('apiKey')]
    public string $apiKey;

    /**
     * @var ?value-of<CreateElevenLabsCredentialDtoApiUrl> $apiUrl ElevenLabs-only API environment for this key: the global endpoint or the EU data residency endpoint. In EU deployments, new credentials must explicitly use the EU data residency endpoint; existing credentials may omit this field on update to retain their saved endpoint. Outside EU deployments, Vapi detects an omitted endpoint automatically and null on update clears and re-detects the endpoint.
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
     *   apiKey: string,
     *   apiUrl?: ?value-of<CreateElevenLabsCredentialDtoApiUrl>,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->apiKey = $values['apiKey'];
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
