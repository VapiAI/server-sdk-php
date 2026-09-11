<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use DateTime;
use Vapi\Core\Types\Date;

class ToolDraft extends JsonSerializableType
{
    /**
     * @var ?array<ToolDraftMessagesItem> $messages Messages spoken while the tool is running. Multiple request-start messages are variants. For request-response-delayed, same timing means variants and different timings mean staged updates.
     */
    #[JsonProperty('messages'), ArrayType([ToolDraftMessagesItem::class])]
    public ?array $messages;

    /**
     * @var ?value-of<ToolDraftType> $type This is the type of the tool.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var string $id Key used as `draftId` in URLs.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId This is the unique identifier for the org that owns this draft.
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * This is the unique identifier for the tool this draft was forked from.
     * Intentionally NOT a FK — `tool_draft` mirrors `tool_version` / `version_pin`'s
     * no-FK / app-cleanup philosophy, so there is no `ON DELETE CASCADE`. Drafts
     * must be cleaned up explicitly (`toolDraftDelete({ orgId, toolId })`) on a
     * parent tool hard-delete; nothing reaps them automatically.
     *
     * @var string $toolId
     */
    #[JsonProperty('toolId')]
    public string $toolId;

    /**
     * The published version this draft was forked from. Server defaults to
     * `tool.latestVersion` on POST if omitted. Immutable for the draft's lifetime.
     *
     * @var string $baseVersion
     */
    #[JsonProperty('baseVersion')]
    public string $baseVersion;

    /**
     * @var ?string $createdBy Email when JWT, null when API or external JWT. Set on POST, never rewritten on PATCH.
     */
    #[JsonProperty('createdBy')]
    public ?string $createdBy;

    /**
     * @var DateTime $createdAt This is the ISO 8601 date-time string of when the draft was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt This is the ISO 8601 date-time string of when the draft was last updated.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * This is the plan to reject a tool call based on the conversation state.
     *
     * // Example 1: Reject endCall if user didn't say goodbye
     * ```json
     * {
     *   conditions: [{
     *     type: 'regex',
     *     regex: '(?i)\\b(bye|goodbye|farewell|see you later|take care)\\b',
     *     target: { position: -1, role: 'user' },
     *     negate: true  // Reject if pattern does NOT match
     *   }]
     * }
     * ```
     *
     * // Example 2: Reject transfer if user is actually asking a question
     * ```json
     * {
     *   conditions: [{
     *     type: 'regex',
     *     regex: '\\?',
     *     target: { position: -1, role: 'user' }
     *   }]
     * }
     * ```
     *
     * // Example 3: Reject transfer if user didn't mention transfer recently
     * ```json
     * {
     *   conditions: [{
     *     type: 'liquid',
     *     liquid: `{% assign recentMessages = messages | last: 5 %}
     * {% assign userMessages = recentMessages | where: 'role', 'user' %}
     * {% assign mentioned = false %}
     * {% for msg in userMessages %}
     *   {% if msg.content contains 'transfer' or msg.content contains 'connect' or msg.content contains 'speak to' %}
     *     {% assign mentioned = true %}
     *     {% break %}
     *   {% endif %}
     * {% endfor %}
     * {% if mentioned %}
     *   false
     * {% else %}
     *   true
     * {% endif %}`
     *   }]
     * }
     * ```
     *
     * // Example 4: Reject endCall if the bot is looping and trying to exit
     * ```json
     * {
     *   conditions: [{
     *     type: 'liquid',
     *     liquid: `{% assign recentMessages = messages | last: 6 %}
     * {% assign userMessages = recentMessages | where: 'role', 'user' | reverse %}
     * {% if userMessages.size < 3 %}
     *   false
     * {% else %}
     *   {% assign msg1 = userMessages[0].content | downcase %}
     *   {% assign msg2 = userMessages[1].content | downcase %}
     *   {% assign msg3 = userMessages[2].content | downcase %}
     *   {% comment %} Check for repetitive messages {% endcomment %}
     *   {% if msg1 == msg2 or msg1 == msg3 or msg2 == msg3 %}
     *     true
     *   {% comment %} Check for common loop phrases {% endcomment %}
     *   {% elsif msg1 contains 'cool thanks' or msg2 contains 'cool thanks' or msg3 contains 'cool thanks' %}
     *     true
     *   {% elsif msg1 contains 'okay thanks' or msg2 contains 'okay thanks' or msg3 contains 'okay thanks' %}
     *     true
     *   {% elsif msg1 contains 'got it' or msg2 contains 'got it' or msg3 contains 'got it' %}
     *     true
     *   {% else %}
     *     false
     *   {% endif %}
     * {% endif %}`
     *   }]
     * }
     * ```
     *
     * @var ?ToolRejectionPlan $rejectionPlan
     */
    #[JsonProperty('rejectionPlan')]
    public ?ToolRejectionPlan $rejectionPlan;

    /**
     * @var ?OpenAiFunction $function This is the function definition of the tool.
     */
    #[JsonProperty('function')]
    public ?OpenAiFunction $function;

    /**
     * Provider-specific metadata. Polymorphic across tool variants with no shared
     * discriminator, so it is validated as a plain object (mirrors how
     * `ToolCallResult.metadata` is typed).
     *
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?string $templateId This is the unique identifier for the template this tool was created from.
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
     * @var ?array<array<string, mixed>> $destinations These are the destinations that the call can be transferred to.
     */
    #[JsonProperty('destinations'), ArrayType([['string' => 'mixed']])]
    public ?array $destinations;

    /**
     * @var ?string $name This is the name of the tool. This will be passed to the model.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $subType This is the sub type of the tool (e.g. for computer, bash and text-editor tools).
     */
    #[JsonProperty('subType')]
    public ?string $subType;

    /**
     * @var ?float $displayWidthPx The display width in pixels (computer tool).
     */
    #[JsonProperty('displayWidthPx')]
    public ?float $displayWidthPx;

    /**
     * @var ?float $displayHeightPx The display height in pixels (computer tool).
     */
    #[JsonProperty('displayHeightPx')]
    public ?float $displayHeightPx;

    /**
     * @var ?float $displayNumber Optional display number (computer tool).
     */
    #[JsonProperty('displayNumber')]
    public ?float $displayNumber;

    /**
     * @var ?array<KnowledgeBase> $knowledgeBases The knowledge bases to query (query tool).
     */
    #[JsonProperty('knowledgeBases'), ArrayType([KnowledgeBase::class])]
    public ?array $knowledgeBases;

    /**
     * @var ?string $url This is where the request will be sent (api-request tool).
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?value-of<ToolDraftMethod> $method This is the HTTP method for the request (api-request tool).
     */
    #[JsonProperty('method')]
    public ?string $method;

    /**
     * @var ?JsonSchema $headers These are the headers to send with the request (api-request / sip-request tool).
     */
    #[JsonProperty('headers')]
    public ?JsonSchema $headers;

    /**
     * This is the body of the request. Either a JSON schema (api-request) or a
     * literal string / schema (sip-request).
     *
     * @var ?array<string, mixed> $body
     */
    #[JsonProperty('body'), ArrayType(['string' => 'mixed'])]
    public ?array $body;

    /**
     * @var ?BackoffPlan $backoffPlan This is the backoff plan if the request fails.
     */
    #[JsonProperty('backoffPlan')]
    public ?BackoffPlan $backoffPlan;

    /**
     * @var ?float $timeoutSeconds This is the timeout in seconds for the request.
     */
    #[JsonProperty('timeoutSeconds')]
    public ?float $timeoutSeconds;

    /**
     * @var ?string $description This is the description of the tool. This will be passed to the model.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?VariableExtractionPlan $variableExtractionPlan This is the plan to extract variables from the tool's response.
     */
    #[JsonProperty('variableExtractionPlan')]
    public ?VariableExtractionPlan $variableExtractionPlan;

    /**
     * @var ?string $credentialId This is the credential ID that will be used for authorization.
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
     * @var ?string $code This is the TypeScript code that will be executed when the tool is called (code tool).
     */
    #[JsonProperty('code')]
    public ?string $code;

    /**
     * @var ?array<CodeToolEnvironmentVariable> $environmentVariables These are the environment variables available in the code via the `env` object (code tool).
     */
    #[JsonProperty('environmentVariables'), ArrayType([CodeToolEnvironmentVariable::class])]
    public ?array $environmentVariables;

    /**
     * @var ?array<ToolParameter> $parameters These are the static parameters to merge into the tool's request body.
     */
    #[JsonProperty('parameters'), ArrayType([ToolParameter::class])]
    public ?array $parameters;

    /**
     * @var ?array<string> $encryptedPaths This is the paths to encrypt in the request body.
     */
    #[JsonProperty('encryptedPaths'), ArrayType(['string'])]
    public ?array $encryptedPaths;

    /**
     * @var ?bool $sipInfoDtmfEnabled This enables sending DTMF tones via SIP INFO messages instead of RFC 2833.
     */
    #[JsonProperty('sipInfoDtmfEnabled')]
    public ?bool $sipInfoDtmfEnabled;

    /**
     * @var ?value-of<ToolDraftVerb> $verb This is the SIP method to send (sip-request tool).
     */
    #[JsonProperty('verb')]
    public ?string $verb;

    /**
     * @var ?string $defaultResult This is the default local tool result message used when no runtime override is returned (handoff tool).
     */
    #[JsonProperty('defaultResult')]
    public ?string $defaultResult;

    /**
     * @var ?array<McpToolMessages> $toolMessages Per-tool message overrides for individual tools loaded from the MCP server (mcp tool).
     */
    #[JsonProperty('toolMessages'), ArrayType([McpToolMessages::class])]
    public ?array $toolMessages;

    /**
     * @param array{
     *   id: string,
     *   orgId: string,
     *   toolId: string,
     *   baseVersion: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   messages?: ?array<ToolDraftMessagesItem>,
     *   type?: ?value-of<ToolDraftType>,
     *   createdBy?: ?string,
     *   rejectionPlan?: ?ToolRejectionPlan,
     *   function?: ?OpenAiFunction,
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
     *   knowledgeBases?: ?array<KnowledgeBase>,
     *   url?: ?string,
     *   method?: ?value-of<ToolDraftMethod>,
     *   headers?: ?JsonSchema,
     *   body?: ?array<string, mixed>,
     *   backoffPlan?: ?BackoffPlan,
     *   timeoutSeconds?: ?float,
     *   description?: ?string,
     *   variableExtractionPlan?: ?VariableExtractionPlan,
     *   credentialId?: ?string,
     *   extendedDelayWhenPrecededByTextEnabled?: ?bool,
     *   beepDetectionEnabled?: ?bool,
     *   code?: ?string,
     *   environmentVariables?: ?array<CodeToolEnvironmentVariable>,
     *   parameters?: ?array<ToolParameter>,
     *   encryptedPaths?: ?array<string>,
     *   sipInfoDtmfEnabled?: ?bool,
     *   verb?: ?value-of<ToolDraftVerb>,
     *   defaultResult?: ?string,
     *   toolMessages?: ?array<McpToolMessages>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->messages = $values['messages'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->toolId = $values['toolId'];
        $this->baseVersion = $values['baseVersion'];
        $this->createdBy = $values['createdBy'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->rejectionPlan = $values['rejectionPlan'] ?? null;
        $this->function = $values['function'] ?? null;
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
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
