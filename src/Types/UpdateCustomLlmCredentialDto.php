<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class UpdateCustomLlmCredentialDto extends JsonSerializableType
{
    /**
     * @var ?string $apiKey This is not returned in the API.
     */
    #[JsonProperty('apiKey')]
    public ?string $apiKey;

    /**
     * @var ?OAuth2AuthenticationPlan $authenticationPlan This is the authentication plan. Currently supports OAuth2 RFC 6749. To use Bearer authentication, use apiKey
     */
    #[JsonProperty('authenticationPlan')]
    public ?OAuth2AuthenticationPlan $authenticationPlan;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   apiKey?: ?string,
     *   authenticationPlan?: ?OAuth2AuthenticationPlan,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->apiKey = $values['apiKey'] ?? null;
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
