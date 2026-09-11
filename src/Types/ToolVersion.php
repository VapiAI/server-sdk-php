<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use DateTime;
use Vapi\Core\Types\Date;

class ToolVersion extends JsonSerializableType
{
    /**
     * @var ?string $versionName Optional human-readable label for this version. Pass `null` to clear.
     */
    #[JsonProperty('versionName')]
    public ?string $versionName;

    /**
     * @var ?string $versionDescription Optional description for this version. Pass `null` to clear.
     */
    #[JsonProperty('versionDescription')]
    public ?string $versionDescription;

    /**
     * @var ?array<string, mixed> $type
     */
    #[JsonProperty('type'), ArrayType(['string' => 'mixed'])]
    public ?array $type;

    /**
     * @var ?array<string, mixed> $function
     */
    #[JsonProperty('function'), ArrayType(['string' => 'mixed'])]
    public ?array $function;

    /**
     * @var ?array<array<string, mixed>> $messages
     */
    #[JsonProperty('messages'), ArrayType([['string' => 'mixed']])]
    public ?array $messages;

    /**
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?string $templateId
     */
    #[JsonProperty('templateId')]
    public ?string $templateId;

    /**
     * @var ?Server $server
     */
    #[JsonProperty('server')]
    public ?Server $server;

    /**
     * @var ?bool $async
     */
    #[JsonProperty('async')]
    public ?bool $async;

    /**
     * @var ?array<array<string, mixed>> $destinations
     */
    #[JsonProperty('destinations'), ArrayType([['string' => 'mixed']])]
    public ?array $destinations;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $subType
     */
    #[JsonProperty('subType')]
    public ?string $subType;

    /**
     * @var ?float $displayWidthPx
     */
    #[JsonProperty('displayWidthPx')]
    public ?float $displayWidthPx;

    /**
     * @var ?float $displayHeightPx
     */
    #[JsonProperty('displayHeightPx')]
    public ?float $displayHeightPx;

    /**
     * @var ?float $displayNumber
     */
    #[JsonProperty('displayNumber')]
    public ?float $displayNumber;

    /**
     * @var ?array<array<string, mixed>> $knowledgeBases
     */
    #[JsonProperty('knowledgeBases'), ArrayType([['string' => 'mixed']])]
    public ?array $knowledgeBases;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?string $method
     */
    #[JsonProperty('method')]
    public ?string $method;

    /**
     * @var ?array<string, mixed> $headers
     */
    #[JsonProperty('headers'), ArrayType(['string' => 'mixed'])]
    public ?array $headers;

    /**
     * @var ?array<string, mixed> $body
     */
    #[JsonProperty('body'), ArrayType(['string' => 'mixed'])]
    public ?array $body;

    /**
     * @var ?array<string, mixed> $backoffPlan
     */
    #[JsonProperty('backoffPlan'), ArrayType(['string' => 'mixed'])]
    public ?array $backoffPlan;

    /**
     * @var ?float $timeoutSeconds
     */
    #[JsonProperty('timeoutSeconds')]
    public ?float $timeoutSeconds;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?array<string, mixed> $variableExtractionPlan
     */
    #[JsonProperty('variableExtractionPlan'), ArrayType(['string' => 'mixed'])]
    public ?array $variableExtractionPlan;

    /**
     * @var ?array<string, mixed> $rejectionPlan
     */
    #[JsonProperty('rejectionPlan'), ArrayType(['string' => 'mixed'])]
    public ?array $rejectionPlan;

    /**
     * @var ?string $credentialId
     */
    #[JsonProperty('credentialId')]
    public ?string $credentialId;

    /**
     * @var ?bool $extendedDelayWhenPrecededByTextEnabled
     */
    #[JsonProperty('extendedDelayWhenPrecededByTextEnabled')]
    public ?bool $extendedDelayWhenPrecededByTextEnabled;

    /**
     * @var ?bool $beepDetectionEnabled
     */
    #[JsonProperty('beepDetectionEnabled')]
    public ?bool $beepDetectionEnabled;

    /**
     * @var ?string $code
     */
    #[JsonProperty('code')]
    public ?string $code;

    /**
     * @var ?array<array<string, mixed>> $environmentVariables
     */
    #[JsonProperty('environmentVariables'), ArrayType([['string' => 'mixed']])]
    public ?array $environmentVariables;

    /**
     * @var ?array<array<string, mixed>> $parameters
     */
    #[JsonProperty('parameters'), ArrayType([['string' => 'mixed']])]
    public ?array $parameters;

    /**
     * @var ?array<string> $encryptedPaths
     */
    #[JsonProperty('encryptedPaths'), ArrayType(['string'])]
    public ?array $encryptedPaths;

    /**
     * @var ?bool $sipInfoDtmfEnabled
     */
    #[JsonProperty('sipInfoDtmfEnabled')]
    public ?bool $sipInfoDtmfEnabled;

    /**
     * @var ?string $verb
     */
    #[JsonProperty('verb')]
    public ?string $verb;

    /**
     * @var ?string $defaultResult
     */
    #[JsonProperty('defaultResult')]
    public ?string $defaultResult;

    /**
     * @var ?array<array<string, mixed>> $toolMessages
     */
    #[JsonProperty('toolMessages'), ArrayType([['string' => 'mixed']])]
    public ?array $toolMessages;

    /**
     * @var string $id This is the unique identifier for the version row.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId This is the unique identifier for the org that owns this version.
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var string $toolId This is the unique identifier for the tool this version was snapshotted from.
     */
    #[JsonProperty('toolId')]
    public string $toolId;

    /**
     * This is the public monotonic version label, e.g. "v1".
     * System-owned and incremented per tool; never user-supplied.
     *
     * @var string $version
     */
    #[JsonProperty('version')]
    public string $version;

    /**
     * @var string $configHash This is the SHA-256 hex of the snapshotted content used for no-op detection.
     */
    #[JsonProperty('configHash')]
    public string $configHash;

    /**
     * @var ?string $parentVersion This is the prior version label (vN-1). Null on v1 or for branch roots.
     */
    #[JsonProperty('parentVersion')]
    public ?string $parentVersion;

    /**
     * @var ?string $createdBy This is the actor that wrote this version. Email when created via JWT, null when created via API.
     */
    #[JsonProperty('createdBy')]
    public ?string $createdBy;

    /**
     * @var ?DateTime $deletedAt This is the soft-delete timestamp. Null when active.
     */
    #[JsonProperty('deletedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $deletedAt;

    /**
     * @var DateTime $createdAt This is the ISO 8601 date-time string of when the version was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @param array{
     *   id: string,
     *   orgId: string,
     *   toolId: string,
     *   version: string,
     *   configHash: string,
     *   createdAt: DateTime,
     *   versionName?: ?string,
     *   versionDescription?: ?string,
     *   type?: ?array<string, mixed>,
     *   function?: ?array<string, mixed>,
     *   messages?: ?array<array<string, mixed>>,
     *   metadata?: ?array<string, mixed>,
     *   templateId?: ?string,
     *   server?: ?Server,
     *   async?: ?bool,
     *   destinations?: ?array<array<string, mixed>>,
     *   name?: ?string,
     *   subType?: ?string,
     *   displayWidthPx?: ?float,
     *   displayHeightPx?: ?float,
     *   displayNumber?: ?float,
     *   knowledgeBases?: ?array<array<string, mixed>>,
     *   url?: ?string,
     *   method?: ?string,
     *   headers?: ?array<string, mixed>,
     *   body?: ?array<string, mixed>,
     *   backoffPlan?: ?array<string, mixed>,
     *   timeoutSeconds?: ?float,
     *   description?: ?string,
     *   variableExtractionPlan?: ?array<string, mixed>,
     *   rejectionPlan?: ?array<string, mixed>,
     *   credentialId?: ?string,
     *   extendedDelayWhenPrecededByTextEnabled?: ?bool,
     *   beepDetectionEnabled?: ?bool,
     *   code?: ?string,
     *   environmentVariables?: ?array<array<string, mixed>>,
     *   parameters?: ?array<array<string, mixed>>,
     *   encryptedPaths?: ?array<string>,
     *   sipInfoDtmfEnabled?: ?bool,
     *   verb?: ?string,
     *   defaultResult?: ?string,
     *   toolMessages?: ?array<array<string, mixed>>,
     *   parentVersion?: ?string,
     *   createdBy?: ?string,
     *   deletedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->versionName = $values['versionName'] ?? null;
        $this->versionDescription = $values['versionDescription'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->function = $values['function'] ?? null;
        $this->messages = $values['messages'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->templateId = $values['templateId'] ?? null;
        $this->server = $values['server'] ?? null;
        $this->async = $values['async'] ?? null;
        $this->destinations = $values['destinations'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->subType = $values['subType'] ?? null;
        $this->displayWidthPx = $values['displayWidthPx'] ?? null;
        $this->displayHeightPx = $values['displayHeightPx'] ?? null;
        $this->displayNumber = $values['displayNumber'] ?? null;
        $this->knowledgeBases = $values['knowledgeBases'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->method = $values['method'] ?? null;
        $this->headers = $values['headers'] ?? null;
        $this->body = $values['body'] ?? null;
        $this->backoffPlan = $values['backoffPlan'] ?? null;
        $this->timeoutSeconds = $values['timeoutSeconds'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->variableExtractionPlan = $values['variableExtractionPlan'] ?? null;
        $this->rejectionPlan = $values['rejectionPlan'] ?? null;
        $this->credentialId = $values['credentialId'] ?? null;
        $this->extendedDelayWhenPrecededByTextEnabled = $values['extendedDelayWhenPrecededByTextEnabled'] ?? null;
        $this->beepDetectionEnabled = $values['beepDetectionEnabled'] ?? null;
        $this->code = $values['code'] ?? null;
        $this->environmentVariables = $values['environmentVariables'] ?? null;
        $this->parameters = $values['parameters'] ?? null;
        $this->encryptedPaths = $values['encryptedPaths'] ?? null;
        $this->sipInfoDtmfEnabled = $values['sipInfoDtmfEnabled'] ?? null;
        $this->verb = $values['verb'] ?? null;
        $this->defaultResult = $values['defaultResult'] ?? null;
        $this->toolMessages = $values['toolMessages'] ?? null;
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->toolId = $values['toolId'];
        $this->version = $values['version'];
        $this->configHash = $values['configHash'];
        $this->parentVersion = $values['parentVersion'] ?? null;
        $this->createdBy = $values['createdBy'] ?? null;
        $this->deletedAt = $values['deletedAt'] ?? null;
        $this->createdAt = $values['createdAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
