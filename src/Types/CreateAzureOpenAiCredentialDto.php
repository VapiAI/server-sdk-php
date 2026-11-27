<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * Credentials for authenticating assistant model requests with Azure OpenAI, including region, endpoint, and available models.
 */
class CreateAzureOpenAiCredentialDto extends JsonSerializableType
{
    /**
     * @var value-of<CreateAzureOpenAiCredentialDtoRegion> $region Azure region that hosts the OpenAI resource.
     */
    #[JsonProperty('region')]
    public string $region;

    /**
     * @var array<value-of<CreateAzureOpenAiCredentialDtoModelsItem>> $models Azure OpenAI models available through this credential.
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
     * @var ?array<AzureOpenAiDeployment> $deployments These are the names of your Azure deployments, one entry for every model in `models`. Omit the field when every deployment is named after its model; once it has any entry, a model with no entry is rejected, so a deployment named after its model takes `{ "model": "<model>", "name": "<model>" }`. Requests use the first of the org's keys that matches the region (on a live call, also the model), so an org holding two keys for the same region and model should pin `credentialIds` on its assistants.
     */
    #[JsonProperty('deployments'), ArrayType([AzureOpenAiDeployment::class])]
    public ?array $deployments;

    /**
     * @var string $openAiEndpoint Endpoint URL for the Azure OpenAI resource.
     */
    #[JsonProperty('openAIEndpoint')]
    public string $openAiEndpoint;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   region: value-of<CreateAzureOpenAiCredentialDtoRegion>,
     *   models: array<value-of<CreateAzureOpenAiCredentialDtoModelsItem>>,
     *   openAiKey: string,
     *   openAiEndpoint: string,
     *   ocpApimSubscriptionKey?: ?string,
     *   deployments?: ?array<AzureOpenAiDeployment>,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->region = $values['region'];
        $this->models = $values['models'];
        $this->openAiKey = $values['openAiKey'];
        $this->ocpApimSubscriptionKey = $values['ocpApimSubscriptionKey'] ?? null;
        $this->deployments = $values['deployments'] ?? null;
        $this->openAiEndpoint = $values['openAiEndpoint'];
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
