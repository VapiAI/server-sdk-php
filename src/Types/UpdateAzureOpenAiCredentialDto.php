<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class UpdateAzureOpenAiCredentialDto extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateAzureOpenAiCredentialDtoProvider> $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?value-of<UpdateAzureOpenAiCredentialDtoRegion> $region
     */
    #[JsonProperty('region')]
    public ?string $region;

    /**
     * @var ?array<value-of<UpdateAzureOpenAiCredentialDtoModelsItem>> $models
     */
    #[JsonProperty('models'), ArrayType(['string'])]
    public ?array $models;

    /**
     * @var ?string $openAiKey This is not returned in the API.
     */
    #[JsonProperty('openAIKey')]
    public ?string $openAiKey;

    /**
     * @var ?string $ocpApimSubscriptionKey This is not returned in the API.
     */
    #[JsonProperty('ocpApimSubscriptionKey')]
    public ?string $ocpApimSubscriptionKey;

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
     * @var ?string $openAiEndpoint
     */
    #[JsonProperty('openAIEndpoint')]
    public ?string $openAiEndpoint;

    /**
     * @param array{
     *   provider?: ?value-of<UpdateAzureOpenAiCredentialDtoProvider>,
     *   region?: ?value-of<UpdateAzureOpenAiCredentialDtoRegion>,
     *   models?: ?array<value-of<UpdateAzureOpenAiCredentialDtoModelsItem>>,
     *   openAiKey?: ?string,
     *   ocpApimSubscriptionKey?: ?string,
     *   name?: ?string,
     *   deployments?: ?array<AzureOpenAiDeployment>,
     *   openAiEndpoint?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->provider = $values['provider'] ?? null;
        $this->region = $values['region'] ?? null;
        $this->models = $values['models'] ?? null;
        $this->openAiKey = $values['openAiKey'] ?? null;
        $this->ocpApimSubscriptionKey = $values['ocpApimSubscriptionKey'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->deployments = $values['deployments'] ?? null;
        $this->openAiEndpoint = $values['openAiEndpoint'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
