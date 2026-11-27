<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AzureOpenAiDeployment extends JsonSerializableType
{
    /**
     * @var value-of<AzureOpenAiDeploymentModel> $model This is the model the deployment serves. It must be one of the credential's `models`.
     */
    #[JsonProperty('model')]
    public string $model;

    /**
     * @var string $name This is the name of the deployment in your Azure resource, exactly as Azure shows it.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @param array{
     *   model: value-of<AzureOpenAiDeploymentModel>,
     *   name: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->model = $values['model'];
        $this->name = $values['name'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
