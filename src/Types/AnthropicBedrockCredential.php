<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

class AnthropicBedrockCredential extends JsonSerializableType
{
    /**
     * @var value-of<AnthropicBedrockCredentialProvider> $provider
     */
    #[JsonProperty('provider')]
    public string $provider;

    /**
     * @var value-of<AnthropicBedrockCredentialRegion> $region AWS region where Bedrock is configured.
     */
    #[JsonProperty('region')]
    public string $region;

    /**
     * @var AnthropicBedrockCredentialAuthenticationPlan $authenticationPlan Authentication method - either direct IAM credentials or cross-account role assumption.
     */
    #[JsonProperty('authenticationPlan')]
    public AnthropicBedrockCredentialAuthenticationPlan $authenticationPlan;

    /**
     * @var string $id This is the unique identifier for the credential.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId This is the unique identifier for the org that this credential belongs to.
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var DateTime $createdAt This is the ISO 8601 date-time string of when the credential was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt This is the ISO 8601 date-time string of when the assistant was last updated.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var ?AwsStsAuthenticationArtifact $authenticationArtifact Stores the external ID (generated or user-provided) for future AssumeRole calls.
     */
    #[JsonProperty('authenticationArtifact')]
    public ?AwsStsAuthenticationArtifact $authenticationArtifact;

    /**
     * Cached authentication session from AssumeRole (temporary credentials).
     * Managed by the system, auto-refreshed when expired.
     *
     * @var ?AwsStsAuthenticationSession $authenticationSession
     */
    #[JsonProperty('authenticationSession')]
    public ?AwsStsAuthenticationSession $authenticationSession;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   provider: value-of<AnthropicBedrockCredentialProvider>,
     *   region: value-of<AnthropicBedrockCredentialRegion>,
     *   authenticationPlan: AnthropicBedrockCredentialAuthenticationPlan,
     *   id: string,
     *   orgId: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   authenticationArtifact?: ?AwsStsAuthenticationArtifact,
     *   authenticationSession?: ?AwsStsAuthenticationSession,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->provider = $values['provider'];
        $this->region = $values['region'];
        $this->authenticationPlan = $values['authenticationPlan'];
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->authenticationArtifact = $values['authenticationArtifact'] ?? null;
        $this->authenticationSession = $values['authenticationSession'] ?? null;
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
