<?php

namespace Vapi\StructuredOutputs;

use GuzzleHttp\ClientInterface;
use Vapi\Core\Client\RawClient;
use Vapi\StructuredOutputs\Requests\StructuredOutputControllerFindAllRequest;
use Vapi\Types\StructuredOutputPaginatedResponse;
use Vapi\Exceptions\VapiException;
use Vapi\Exceptions\VapiApiException;
use Vapi\Core\Json\JsonApiRequest;
use Vapi\Environments;
use Vapi\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Vapi\StructuredOutputs\Requests\CreateStructuredOutputDto;
use Vapi\Types\StructuredOutput;
use Vapi\StructuredOutputs\Requests\UpdateStructuredOutputDto;

class StructuredOutputsClient
{
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
     * @param StructuredOutputControllerFindAllRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return StructuredOutputPaginatedResponse
     * @throws VapiException
     * @throws VapiApiException
     */
    public function structuredOutputControllerFindAll(StructuredOutputControllerFindAllRequest $request = new StructuredOutputControllerFindAllRequest(), ?array $options = null): StructuredOutputPaginatedResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->id != null) {
            $query['id'] = $request->id;
        }
        if ($request->name != null) {
            $query['name'] = $request->name;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->sortOrder != null) {
            $query['sortOrder'] = $request->sortOrder;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->createdAtGt != null) {
            $query['createdAtGt'] = $request->createdAtGt;
        }
        if ($request->createdAtLt != null) {
            $query['createdAtLt'] = $request->createdAtLt;
        }
        if ($request->createdAtGe != null) {
            $query['createdAtGe'] = $request->createdAtGe;
        }
        if ($request->createdAtLe != null) {
            $query['createdAtLe'] = $request->createdAtLe;
        }
        if ($request->updatedAtGt != null) {
            $query['updatedAtGt'] = $request->updatedAtGt;
        }
        if ($request->updatedAtLt != null) {
            $query['updatedAtLt'] = $request->updatedAtLt;
        }
        if ($request->updatedAtGe != null) {
            $query['updatedAtGe'] = $request->updatedAtGe;
        }
        if ($request->updatedAtLe != null) {
            $query['updatedAtLe'] = $request->updatedAtLe;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "structured-output",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return StructuredOutputPaginatedResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new VapiException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new VapiException(message: $e->getMessage(), previous: $e);
            }
            throw new VapiApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
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
     * @param CreateStructuredOutputDto $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return StructuredOutput
     * @throws VapiException
     * @throws VapiApiException
     */
    public function structuredOutputControllerCreate(CreateStructuredOutputDto $request, ?array $options = null): StructuredOutput
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "structured-output",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return StructuredOutput::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new VapiException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new VapiException(message: $e->getMessage(), previous: $e);
            }
            throw new VapiApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
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
     * @param string $id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return StructuredOutput
     * @throws VapiException
     * @throws VapiApiException
     */
    public function structuredOutputControllerFindOne(string $id, ?array $options = null): StructuredOutput
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "structured-output/{$id}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return StructuredOutput::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new VapiException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new VapiException(message: $e->getMessage(), previous: $e);
            }
            throw new VapiApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
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
     * @param string $id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return StructuredOutput
     * @throws VapiException
     * @throws VapiApiException
     */
    public function structuredOutputControllerRemove(string $id, ?array $options = null): StructuredOutput
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "structured-output/{$id}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return StructuredOutput::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new VapiException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new VapiException(message: $e->getMessage(), previous: $e);
            }
            throw new VapiApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
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
     * @param string $id
     * @param UpdateStructuredOutputDto $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return StructuredOutput
     * @throws VapiException
     * @throws VapiApiException
     */
    public function structuredOutputControllerUpdate(string $id, UpdateStructuredOutputDto $request, ?array $options = null): StructuredOutput
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['schemaOverride'] = $request->schemaOverride;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "structured-output/{$id}",
                    method: HttpMethod::PATCH,
                    query: $query,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return StructuredOutput::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new VapiException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new VapiException(message: $e->getMessage(), previous: $e);
            }
            throw new VapiApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
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
