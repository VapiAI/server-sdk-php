<?php

namespace Vapi\Chats;

use Psr\Http\Client\ClientInterface;
use Vapi\Core\Client\RawClient;
use Vapi\Chats\Requests\ListChatsRequest;
use Vapi\Types\ChatPaginatedResponse;
use Vapi\Exceptions\VapiException;
use Vapi\Exceptions\VapiApiException;
use Vapi\Core\Json\JsonSerializer;
use Vapi\Core\Json\JsonApiRequest;
use Vapi\Environments;
use Vapi\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Vapi\Chats\Requests\CreateChatDto;
use Vapi\Types\Chat;
use Vapi\Types\CreateChatStreamResponse;
use Vapi\Core\Json\JsonDecoder;
use Vapi\Core\Types\Union;
use Vapi\Chats\Requests\OpenAiResponsesRequest;
use Vapi\Types\ResponseObject;
use Vapi\Types\ResponseTextDeltaEvent;
use Vapi\Types\ResponseTextDoneEvent;
use Vapi\Types\ResponseCompletedEvent;
use Vapi\Types\ResponseErrorEvent;

class ChatsClient
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
     * @param ListChatsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ChatPaginatedResponse
     * @throws VapiException
     * @throws VapiApiException
     */
    public function list(ListChatsRequest $request = new ListChatsRequest(), ?array $options = null): ?ChatPaginatedResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->id != null) {
            $query['id'] = $request->id;
        }
        if ($request->assistantId != null) {
            $query['assistantId'] = $request->assistantId;
        }
        if ($request->assistantIdAny != null) {
            $query['assistantIdAny'] = $request->assistantIdAny;
        }
        if ($request->squadId != null) {
            $query['squadId'] = $request->squadId;
        }
        if ($request->sessionId != null) {
            $query['sessionId'] = $request->sessionId;
        }
        if ($request->previousChatId != null) {
            $query['previousChatId'] = $request->previousChatId;
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
                    path: "chat",
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
                return ChatPaginatedResponse::fromJson($json);
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
     * Creates a new chat with optional SMS delivery via transport field. Requires at least one of: assistantId/assistant, sessionId, or previousChatId. Note: sessionId and previousChatId are mutually exclusive. Transport field enables SMS delivery with two modes: (1) New conversation - provide transport.phoneNumberId and transport.customer to create a new session, (2) Existing conversation - provide sessionId to use existing session data. Cannot specify both sessionId and transport fields together. The transport.useLLMGeneratedMessageForOutbound flag controls whether input is processed by LLM (true, default) or forwarded directly as SMS (false).
     *
     * @param CreateChatDto $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return (
     *    Chat
     *   |CreateChatStreamResponse
     * )|null
     * @throws VapiException
     * @throws VapiApiException
     */
    public function create(CreateChatDto $request, ?array $options = null): Chat|CreateChatStreamResponse|null
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "chat",
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
                return JsonDecoder::decodeUnion($json, new Union(Chat::class, CreateChatStreamResponse::class)); // @phpstan-ignore-line
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
     * @param string $id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Chat
     * @throws VapiException
     * @throws VapiApiException
     */
    public function get(string $id, ?array $options = null): ?Chat
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "chat/{$id}",
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
                return Chat::fromJson($json);
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
     * @param string $id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Chat
     * @throws VapiException
     * @throws VapiApiException
     */
    public function delete(string $id, ?array $options = null): ?Chat
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "chat/{$id}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return Chat::fromJson($json);
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
     * @param OpenAiResponsesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return (
     *    ResponseObject
     *   |ResponseTextDeltaEvent
     *   |ResponseTextDoneEvent
     *   |ResponseCompletedEvent
     *   |ResponseErrorEvent
     * )|null
     * @throws VapiException
     * @throws VapiApiException
     */
    public function createResponse(OpenAiResponsesRequest $request, ?array $options = null): ResponseObject|ResponseTextDeltaEvent|ResponseTextDoneEvent|ResponseCompletedEvent|ResponseErrorEvent|null
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "chat/responses",
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
                return JsonDecoder::decodeUnion($json, new Union(ResponseObject::class, ResponseTextDeltaEvent::class, ResponseTextDoneEvent::class, ResponseCompletedEvent::class, ResponseErrorEvent::class)); // @phpstan-ignore-line
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
