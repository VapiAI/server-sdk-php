<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Credentials for authenticating speech recognition and voice synthesis requests with Cartesia.
 */
class CreateCartesiaCredentialDto extends JsonSerializableType
{
    /**
     * @var string $apiKey This is not returned in the API.
     */
    #[JsonProperty('apiKey')]
    public string $apiKey;

    /**
     * @var ?string $apiUrl This can be used to point to an onprem Cartesia instance. Defaults to api.cartesia.ai.
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
     *   apiUrl?: ?string,
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
