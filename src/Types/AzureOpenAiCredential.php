<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use DateTime;
use Vapi\Core\Types\Date;

class AzureOpenAiCredential extends JsonSerializableType
{
    /**
     * @var value-of<AzureOpenAiCredentialProvider> $provider
     */
    #[JsonProperty('provider')]
    public string $provider;

    /**
     * @var value-of<AzureOpenAiCredentialRegion> $region
     */
    #[JsonProperty('region')]
    public string $region;

    /**
     * @var array<value-of<AzureOpenAiCredentialModelsItem>> $models
     */
    #[JsonProperty('models'), ArrayType(['string'])]
    public array $models;

    /**
     * @var string $openAiKey This is not returned in the API.
     */
    #[JsonProperty('openAIKey')]
    public string $openAiKey;

    /**
     * @var ?string $ocpApimSubscriptionKey This is not returned in the API.
     */
    #[JsonProperty('ocpApimSubscriptionKey')]
    public ?string $ocpApimSubscriptionKey;

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
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<AzureOpenAiDeployment> $deployments These are the names of your Azure deployments, one entry for every model in `models`. Omit the field when every deployment is named after its model; once it has any entry, a model with no entry is rejected, so a deployment named after its model takes `{ "model": "<model>", "name": "<model>" }`. Requests use the first of the org's keys that matches the region (on a live call, also the model), so an org holding two keys for the same region and model should pin `credentialIds` on its assistants.
     */
    #[JsonProperty('deployments'), ArrayType([AzureOpenAiDeployment::class])]
    public ?array $deployments;

    /**
     * @var string $openAiEndpoint
     */
    #[JsonProperty('openAIEndpoint')]
    public string $openAiEndpoint;

    /**
     * @param array{
     *   provider: value-of<AzureOpenAiCredentialProvider>,
     *   region: value-of<AzureOpenAiCredentialRegion>,
     *   models: array<value-of<AzureOpenAiCredentialModelsItem>>,
     *   openAiKey: string,
     *   id: string,
     *   orgId: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   openAiEndpoint: string,
     *   ocpApimSubscriptionKey?: ?string,
     *   name?: ?string,
     *   deployments?: ?array<AzureOpenAiDeployment>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->provider = $values['provider'];
        $this->region = $values['region'];
        $this->models = $values['models'];
        $this->openAiKey = $values['openAiKey'];
        $this->ocpApimSubscriptionKey = $values['ocpApimSubscriptionKey'] ?? null;
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->name = $values['name'] ?? null;
        $this->deployments = $values['deployments'] ?? null;
        $this->openAiEndpoint = $values['openAiEndpoint'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
