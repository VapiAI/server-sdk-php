<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Credentials for sending assistant call traces to a Langfuse project, including its public key, secret key, and host URL.
 */
class CreateLangfuseCredentialDto extends JsonSerializableType
{
    /**
     * @var string $publicKey The public key for Langfuse project. Eg: pk-lf-...
     */
    #[JsonProperty('publicKey')]
    public string $publicKey;

    /**
     * @var string $apiKey The secret key for Langfuse project. Eg: sk-lf-... .This is not returned in the API.
     */
    #[JsonProperty('apiKey')]
    public string $apiKey;

    /**
     * @var string $apiUrl The host URL for Langfuse project. Eg: https://cloud.langfuse.com
     */
    #[JsonProperty('apiUrl')]
    public string $apiUrl;

    /**
     * @var ?string $serverVersion The semver version of your Langfuse server, e.g. 3.63.0, as its /api/public/health endpoint reports it. Optional.
     */
    #[JsonProperty('serverVersion')]
    public ?string $serverVersion;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   publicKey: string,
     *   apiKey: string,
     *   apiUrl: string,
     *   serverVersion?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->publicKey = $values['publicKey'];
        $this->apiKey = $values['apiKey'];
        $this->apiUrl = $values['apiUrl'];
        $this->serverVersion = $values['serverVersion'] ?? null;
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
