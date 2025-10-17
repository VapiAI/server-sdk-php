<?php

namespace Vapi;

use Vapi\Assistants\AssistantsClient;
use Vapi\Squads\SquadsClient;
use Vapi\Calls\CallsClient;
use Vapi\Chats\ChatsClient;
use Vapi\Campaigns\CampaignsClient;
use Vapi\Sessions\SessionsClient;
use Vapi\PhoneNumbers\PhoneNumbersClient;
use Vapi\Tools\ToolsClient;
use Vapi\Files\FilesClient;
use Vapi\StructuredOutputs\StructuredOutputsClient;
use Vapi\Eval\EvalClient;
use Vapi\ProviderResources\ProviderResourcesClient;
use Vapi\Analytics\AnalyticsClient;
use GuzzleHttp\ClientInterface;
use Vapi\Core\Client\RawClient;

class VapiClient
{
    /**
     * @var AssistantsClient $assistants
     */
    public AssistantsClient $assistants;

    /**
     * @var SquadsClient $squads
     */
    public SquadsClient $squads;

    /**
     * @var CallsClient $calls
     */
    public CallsClient $calls;

    /**
     * @var ChatsClient $chats
     */
    public ChatsClient $chats;

    /**
     * @var CampaignsClient $campaigns
     */
    public CampaignsClient $campaigns;

    /**
     * @var SessionsClient $sessions
     */
    public SessionsClient $sessions;

    /**
     * @var PhoneNumbersClient $phoneNumbers
     */
    public PhoneNumbersClient $phoneNumbers;

    /**
     * @var ToolsClient $tools
     */
    public ToolsClient $tools;

    /**
     * @var FilesClient $files
     */
    public FilesClient $files;

    /**
     * @var StructuredOutputsClient $structuredOutputs
     */
    public StructuredOutputsClient $structuredOutputs;

    /**
     * @var EvalClient $eval
     */
    public EvalClient $eval;

    /**
     * @var ProviderResourcesClient $providerResources
     */
    public ProviderResourcesClient $providerResources;

    /**
     * @var AnalyticsClient $analytics
     */
    public AnalyticsClient $analytics;

    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param string $token The token to use for authentication.
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        string $token,
        ?array $options = null,
    ) {
        $defaultHeaders = [
            'Authorization' => "Bearer $token",
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Vapi',
            'X-Fern-SDK-Version' => '0.0.1',
            'User-Agent' => 'vapi/vapi/0.0.1',
        ];

        $this->options = $options ?? [];
        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->assistants = new AssistantsClient($this->client, $this->options);
        $this->squads = new SquadsClient($this->client, $this->options);
        $this->calls = new CallsClient($this->client, $this->options);
        $this->chats = new ChatsClient($this->client, $this->options);
        $this->campaigns = new CampaignsClient($this->client, $this->options);
        $this->sessions = new SessionsClient($this->client, $this->options);
        $this->phoneNumbers = new PhoneNumbersClient($this->client, $this->options);
        $this->tools = new ToolsClient($this->client, $this->options);
        $this->files = new FilesClient($this->client, $this->options);
        $this->structuredOutputs = new StructuredOutputsClient($this->client, $this->options);
        $this->eval = new EvalClient($this->client, $this->options);
        $this->providerResources = new ProviderResourcesClient($this->client, $this->options);
        $this->analytics = new AnalyticsClient($this->client, $this->options);
    }
}
