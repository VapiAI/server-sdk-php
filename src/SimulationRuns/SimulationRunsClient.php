<?php

namespace Vapi\SimulationRuns;

use Psr\Http\Client\ClientInterface;
use Vapi\Core\Client\RawClient;
use Vapi\SimulationRuns\Requests\SimulationRunControllerFindAllRequest;
use Vapi\Types\SimulationRun;
use Vapi\Types\SimulationRunsPaginatedResponse;
use Vapi\Exceptions\VapiException;
use Vapi\Exceptions\VapiApiException;
use Vapi\Core\Json\JsonSerializer;
use Vapi\Core\Json\JsonApiRequest;
use Vapi\Environments;
use Vapi\Core\Client\HttpMethod;
use Vapi\Core\Json\JsonDecoder;
use Vapi\Core\Types\Union;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Vapi\SimulationRuns\Requests\CreateSimulationRunDto;
use Vapi\Types\CreateSimulationRunResponse;
use Vapi\SimulationRuns\Requests\SimulationRunControllerFindItemsRequest;
use Vapi\Types\SimulationRunItem;
use Vapi\SimulationRuns\Requests\SimulationRunControllerGenerateSuggestionsRequest;

class SimulationRunsClient
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
     * Returns the simulation runs for the authenticated organization.
     *
     * @param SimulationRunControllerFindAllRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return (
     *    array<SimulationRun>
     *   |SimulationRunsPaginatedResponse
     * )|null
     * @throws VapiException
     * @throws VapiApiException
     */
    public function simulationRunControllerFindAll(SimulationRunControllerFindAllRequest $request = new SimulationRunControllerFindAllRequest(), ?array $options = null): array|SimulationRunsPaginatedResponse|null
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->filterStatus != null) {
            $query['filterStatus'] = $request->filterStatus;
        }
        if ($request->targetType != null) {
            $query['targetType'] = $request->targetType;
        }
        if ($request->targetId != null) {
            $query['targetId'] = $request->targetId;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->sortOrder != null) {
            $query['sortOrder'] = $request->sortOrder;
        }
        if ($request->sortBy != null) {
            $query['sortBy'] = $request->sortBy;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
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
                    path: "eval/simulation/run",
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
                return JsonDecoder::decodeUnion($json, new Union([SimulationRun::class], SimulationRunsPaginatedResponse::class)); // @phpstan-ignore-line
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
     * Starts a simulation run against a target assistant or squad.
     *
     * @param CreateSimulationRunDto $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateSimulationRunResponse
     * @throws VapiException
     * @throws VapiApiException
     */
    public function simulationRunControllerCreate(CreateSimulationRunDto $request, ?array $options = null): ?CreateSimulationRunResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "eval/simulation/run",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return CreateSimulationRunResponse::fromJson($json);
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
     * Returns the specified simulation run, including its status and item counts.
     *
     * @param string $id The unique identifier of the simulation run.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SimulationRun
     * @throws VapiException
     * @throws VapiApiException
     */
    public function simulationRunControllerFindOne(string $id, ?array $options = null): ?SimulationRun
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "eval/simulation/run/{$id}",
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
                return SimulationRun::fromJson($json);
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
     * Cancels the specified simulation run.
     *
     * @param string $id The unique identifier of the simulation run.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SimulationRun
     * @throws VapiException
     * @throws VapiApiException
     */
    public function simulationRunControllerCancelGroup(string $id, ?array $options = null): ?SimulationRun
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "eval/simulation/run/{$id}",
                    method: HttpMethod::PATCH,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return SimulationRun::fromJson($json);
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
     * Returns the run items for the specified simulation run.
     *
     * @param string $id The unique identifier of the simulation run.
     * @param SimulationRunControllerFindItemsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?array<SimulationRunItem>
     * @throws VapiException
     * @throws VapiApiException
     */
    public function simulationRunControllerFindItems(string $id, SimulationRunControllerFindItemsRequest $request = new SimulationRunControllerFindItemsRequest(), ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->simulationId != null) {
            $query['simulationId'] = $request->simulationId;
        }
        if ($request->runId != null) {
            $query['runId'] = $request->runId;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->sortOrder != null) {
            $query['sortOrder'] = $request->sortOrder;
        }
        if ($request->sortBy != null) {
            $query['sortBy'] = $request->sortBy;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
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
                    path: "eval/simulation/run/{$id}/item",
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
                return JsonDecoder::decodeArray($json, [SimulationRunItem::class]); // @phpstan-ignore-line
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
     * Returns the specified run item, including its evaluation results and the ID of the call that ran it.
     *
     * @param string $id The unique identifier of the simulation run.
     * @param string $itemId The unique identifier of the run item.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SimulationRunItem
     * @throws VapiException
     * @throws VapiApiException
     */
    public function simulationRunControllerFindItem(string $id, string $itemId, ?array $options = null): ?SimulationRunItem
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "eval/simulation/run/{$id}/item/{$itemId}",
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
                return SimulationRunItem::fromJson($json);
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
     * Cancels the specified run item.
     *
     * @param string $id The unique identifier of the simulation run.
     * @param string $itemId The unique identifier of the run item.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SimulationRunItem
     * @throws VapiException
     * @throws VapiApiException
     */
    public function simulationRunControllerCancelItem(string $id, string $itemId, ?array $options = null): ?SimulationRunItem
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "eval/simulation/run/{$id}/item/{$itemId}",
                    method: HttpMethod::PATCH,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return SimulationRunItem::fromJson($json);
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
     * Generates AI suggestions for improving the assistant or squad's system prompt, tools, and scenarios, based on the specified run item.
     *
     * @param string $id The unique identifier of the simulation run.
     * @param string $itemId The unique identifier of the run item.
     * @param SimulationRunControllerGenerateSuggestionsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws VapiException
     * @throws VapiApiException
     */
    public function simulationRunControllerGenerateSuggestions(string $id, string $itemId, SimulationRunControllerGenerateSuggestionsRequest $request, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['force'] = $request->force;
        if ($request->persist != null) {
            $query['persist'] = $request->persist;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "eval/simulation/run/{$id}/item/{$itemId}/generate",
                    method: HttpMethod::POST,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
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
