<?php

namespace Vapi\GuardrailRules;

use Psr\Http\Client\ClientInterface;
use Vapi\Core\Client\RawClient;
use Vapi\GuardrailRules\Requests\GuardrailRulesControllerListRequest;
use Vapi\Types\GuardrailRule;
use Vapi\Exceptions\VapiException;
use Vapi\Exceptions\VapiApiException;
use Vapi\Core\Json\JsonSerializer;
use Vapi\Core\Json\JsonApiRequest;
use Vapi\Environments;
use Vapi\Core\Client\HttpMethod;
use Vapi\Core\Json\JsonDecoder;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Vapi\GuardrailRules\Requests\GuardrailRulesControllerPaginatedRequest;
use Vapi\Types\GuardrailRulesPage;

class GuardrailRulesClient
{
    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
    }

    /**
     * @param GuardrailRulesControllerListRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?array<GuardrailRule>
     * @throws VapiException
     * @throws VapiApiException
     */
    public function guardrailRulesControllerList(GuardrailRulesControllerListRequest $request = new GuardrailRulesControllerListRequest(), ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->search != null) {
            $query['search'] = $request->search;
        }
        if ($request->packId != null) {
            $query['packId'] = $request->packId;
        }
        if ($request->createdAtGt != null) {
            $query['createdAtGt'] = JsonSerializer::serializeDateTime($request->createdAtGt);
        }
        if ($request->createdAtLt != null) {
            $query['createdAtLt'] = JsonSerializer::serializeDateTime($request->createdAtLt);
        }
        if ($request->createdAtGe != null) {
            $query['createdAtGe'] = JsonSerializer::serializeDateTime($request->createdAtGe);
        }
        if ($request->createdAtLe != null) {
            $query['createdAtLe'] = JsonSerializer::serializeDateTime($request->createdAtLe);
        }
        if ($request->updatedAtGt != null) {
            $query['updatedAtGt'] = JsonSerializer::serializeDateTime($request->updatedAtGt);
        }
        if ($request->updatedAtLt != null) {
            $query['updatedAtLt'] = JsonSerializer::serializeDateTime($request->updatedAtLt);
        }
        if ($request->updatedAtGe != null) {
            $query['updatedAtGe'] = JsonSerializer::serializeDateTime($request->updatedAtGe);
        }
        if ($request->updatedAtLe != null) {
            $query['updatedAtLe'] = JsonSerializer::serializeDateTime($request->updatedAtLe);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "guardrail/rules",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return JsonDecoder::decodeArray($json, [GuardrailRule::class]); // @phpstan-ignore-line
            }
        } catch (JsonException $e) {
            throw new VapiException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new VapiException(message: $e->getMessage(), previous: $e);
        }
        throw new VapiApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * @param GuardrailRulesControllerPaginatedRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GuardrailRulesPage
     * @throws VapiException
     * @throws VapiApiException
     */
    public function guardrailRulesControllerPaginated(GuardrailRulesControllerPaginatedRequest $request = new GuardrailRulesControllerPaginatedRequest(), ?array $options = null): ?GuardrailRulesPage
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->search != null) {
            $query['search'] = $request->search;
        }
        if ($request->packId != null) {
            $query['packId'] = $request->packId;
        }
        if ($request->sortBy != null) {
            $query['sortBy'] = $request->sortBy;
        }
        if ($request->createdAtGt != null) {
            $query['createdAtGt'] = JsonSerializer::serializeDateTime($request->createdAtGt);
        }
        if ($request->createdAtLt != null) {
            $query['createdAtLt'] = JsonSerializer::serializeDateTime($request->createdAtLt);
        }
        if ($request->createdAtGe != null) {
            $query['createdAtGe'] = JsonSerializer::serializeDateTime($request->createdAtGe);
        }
        if ($request->createdAtLe != null) {
            $query['createdAtLe'] = JsonSerializer::serializeDateTime($request->createdAtLe);
        }
        if ($request->updatedAtGt != null) {
            $query['updatedAtGt'] = JsonSerializer::serializeDateTime($request->updatedAtGt);
        }
        if ($request->updatedAtLt != null) {
            $query['updatedAtLt'] = JsonSerializer::serializeDateTime($request->updatedAtLt);
        }
        if ($request->updatedAtGe != null) {
            $query['updatedAtGe'] = JsonSerializer::serializeDateTime($request->updatedAtGe);
        }
        if ($request->updatedAtLe != null) {
            $query['updatedAtLe'] = JsonSerializer::serializeDateTime($request->updatedAtLe);
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->sortOrder != null) {
            $query['sortOrder'] = $request->sortOrder;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "guardrail/rules/paginated",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return GuardrailRulesPage::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new VapiException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new VapiException(message: $e->getMessage(), previous: $e);
        }
        throw new VapiApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * @param string $id The unique identifier for the resource.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GuardrailRule
     * @throws VapiException
     * @throws VapiApiException
     */
    public function guardrailRulesControllerFind(string $id, ?array $options = null): ?GuardrailRule
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "guardrail/rules/{$id}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return GuardrailRule::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new VapiException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new VapiException(message: $e->getMessage(), previous: $e);
        }
        throw new VapiApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
