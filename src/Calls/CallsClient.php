<?php

namespace Vapi\Calls;

use GuzzleHttp\ClientInterface;
use Vapi\Core\Client\RawClient;
use Vapi\Calls\Requests\CallsListRequest;
use Vapi\Types\Call;
use Vapi\Exceptions\VapiException;
use Vapi\Exceptions\VapiApiException;
use Vapi\Core\Json\JsonApiRequest;
use Vapi\Environments;
use Vapi\Core\Client\HttpMethod;
use Vapi\Core\Json\JsonDecoder;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Vapi\Calls\Requests\CreateCallDto;
use Vapi\Types\CallBatchResponse;
use Vapi\Core\Types\Union;
use Vapi\Calls\Requests\CallControllerFindAllPaginatedRequest;
use Vapi\Types\CallPaginatedResponse;
use Vapi\Calls\Requests\DeleteCallDto;
use Vapi\Calls\Requests\UpdateCallDto;

class CallsClient
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
     * @param CallsListRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return array<Call>
     * @throws VapiException
     * @throws VapiApiException
     */
    public function list(CallsListRequest $request = new CallsListRequest(), ?array $options = null): array
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->id != null) {
            $query['id'] = $request->id;
        }
        if ($request->assistantId != null) {
            $query['assistantId'] = $request->assistantId;
        }
        if ($request->phoneNumberId != null) {
            $query['phoneNumberId'] = $request->phoneNumberId;
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
                    path: "call",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return JsonDecoder::decodeArray($json, [Call::class]); // @phpstan-ignore-line
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
     * @param CreateCallDto $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return (
     *    Call
     *   |CallBatchResponse
     * )
     * @throws VapiException
     * @throws VapiApiException
     */
    public function create(CreateCallDto $request = new CreateCallDto(), ?array $options = null): Call|CallBatchResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "call",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return JsonDecoder::decodeUnion($json, new Union(Call::class, CallBatchResponse::class)); // @phpstan-ignore-line
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
     * @param CallControllerFindAllPaginatedRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CallPaginatedResponse
     * @throws VapiException
     * @throws VapiApiException
     */
    public function callControllerFindAllPaginated(CallControllerFindAllPaginatedRequest $request = new CallControllerFindAllPaginatedRequest(), ?array $options = null): CallPaginatedResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->assistantOverrides != null) {
            $query['assistantOverrides'] = $request->assistantOverrides;
        }
        if ($request->customer != null) {
            $query['customer'] = $request->customer;
        }
        if ($request->assistantId != null) {
            $query['assistantId'] = $request->assistantId;
        }
        if ($request->assistantName != null) {
            $query['assistantName'] = $request->assistantName;
        }
        if ($request->id != null) {
            $query['id'] = $request->id;
        }
        if ($request->idAny != null) {
            $query['idAny'] = $request->idAny;
        }
        if ($request->costLe != null) {
            $query['costLe'] = $request->costLe;
        }
        if ($request->costGe != null) {
            $query['costGe'] = $request->costGe;
        }
        if ($request->cost != null) {
            $query['cost'] = $request->cost;
        }
        if ($request->successEvaluation != null) {
            $query['successEvaluation'] = $request->successEvaluation;
        }
        if ($request->endedReason != null) {
            $query['endedReason'] = $request->endedReason;
        }
        if ($request->phoneNumberId != null) {
            $query['phoneNumberId'] = $request->phoneNumberId;
        }
        if ($request->structuredOutputs != null) {
            $query['structuredOutputs'] = $request->structuredOutputs;
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
                    path: "v2/call",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CallPaginatedResponse::fromJson($json);
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
     * @return Call
     * @throws VapiException
     * @throws VapiApiException
     */
    public function get(string $id, ?array $options = null): Call
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "call/{$id}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Call::fromJson($json);
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
     * @param DeleteCallDto $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Call
     * @throws VapiException
     * @throws VapiApiException
     */
    public function delete(string $id, DeleteCallDto $request = new DeleteCallDto(), ?array $options = null): Call
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "call/{$id}",
                    method: HttpMethod::DELETE,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Call::fromJson($json);
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
     * @param UpdateCallDto $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Call
     * @throws VapiException
     * @throws VapiApiException
     */
    public function update(string $id, UpdateCallDto $request = new UpdateCallDto(), ?array $options = null): Call
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "call/{$id}",
                    method: HttpMethod::PATCH,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Call::fromJson($json);
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
