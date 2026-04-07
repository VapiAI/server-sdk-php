<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class UpdateAnthropicBedrockCredentialDto extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateAnthropicBedrockCredentialDtoRegion> $region AWS region where Bedrock is configured.
     */
    #[JsonProperty('region')]
    public ?string $region;

    /**
     * @var ?UpdateAnthropicBedrockCredentialDtoAuthenticationPlan $authenticationPlan Authentication method - either direct IAM credentials or cross-account role assumption.
     */
    #[JsonProperty('authenticationPlan')]
    public ?UpdateAnthropicBedrockCredentialDtoAuthenticationPlan $authenticationPlan;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   region?: ?value-of<UpdateAnthropicBedrockCredentialDtoRegion>,
     *   authenticationPlan?: ?UpdateAnthropicBedrockCredentialDtoAuthenticationPlan,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->region = $values['region'] ?? null;
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
