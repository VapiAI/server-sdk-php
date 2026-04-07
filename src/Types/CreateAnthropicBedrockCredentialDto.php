<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CreateAnthropicBedrockCredentialDto extends JsonSerializableType
{
    /**
     * @var value-of<CreateAnthropicBedrockCredentialDtoRegion> $region AWS region where Bedrock is configured.
     */
    #[JsonProperty('region')]
    public string $region;

    /**
     * @var CreateAnthropicBedrockCredentialDtoAuthenticationPlan $authenticationPlan Authentication method - either direct IAM credentials or cross-account role assumption.
     */
    #[JsonProperty('authenticationPlan')]
    public CreateAnthropicBedrockCredentialDtoAuthenticationPlan $authenticationPlan;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   region: value-of<CreateAnthropicBedrockCredentialDtoRegion>,
     *   authenticationPlan: CreateAnthropicBedrockCredentialDtoAuthenticationPlan,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->region = $values['region'];
        $this->authenticationPlan = $values['authenticationPlan'];
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
