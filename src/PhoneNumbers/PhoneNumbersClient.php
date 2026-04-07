<?php

namespace Vapi\PhoneNumbers;

use Psr\Http\Client\ClientInterface;
use Vapi\Core\Client\RawClient;
use Vapi\PhoneNumbers\Requests\ListPhoneNumbersRequest;
use Vapi\PhoneNumbers\Types\ListPhoneNumbersResponseItem;
use Vapi\Exceptions\VapiException;
use Vapi\Exceptions\VapiApiException;
use Vapi\Core\Json\JsonSerializer;
use Vapi\Core\Json\JsonApiRequest;
use Vapi\Environments;
use Vapi\Core\Client\HttpMethod;
use Vapi\Core\Json\JsonDecoder;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Vapi\PhoneNumbers\Types\CreatePhoneNumbersRequest;
use Vapi\PhoneNumbers\Types\CreatePhoneNumbersResponse;
use Vapi\PhoneNumbers\Requests\PhoneNumberControllerFindAllPaginatedRequest;
use Vapi\Types\PhoneNumberPaginatedResponse;
use Vapi\PhoneNumbers\Types\GetPhoneNumbersResponse;
use Vapi\PhoneNumbers\Types\DeletePhoneNumbersResponse;
use Vapi\PhoneNumbers\Requests\UpdatePhoneNumbersRequest;
use Vapi\PhoneNumbers\Types\UpdatePhoneNumbersResponse;

class PhoneNumbersClient
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
     * @param ListPhoneNumbersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?array<ListPhoneNumbersResponseItem>
     * @throws VapiException
     * @throws VapiApiException
     */
    public function list(ListPhoneNumbersRequest $request = new ListPhoneNumbersRequest(), ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
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
                    path: "phone-number",
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
                return JsonDecoder::decodeArray($json, [ListPhoneNumbersResponseItem::class]); // @phpstan-ignore-line
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
     * @param CreatePhoneNumbersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreatePhoneNumbersResponse
     * @throws VapiException
     * @throws VapiApiException
     */
    public function create(CreatePhoneNumbersRequest $request, ?array $options = null): ?CreatePhoneNumbersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "phone-number",
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
                return CreatePhoneNumbersResponse::fromJson($json);
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
     * @param PhoneNumberControllerFindAllPaginatedRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PhoneNumberPaginatedResponse
     * @throws VapiException
     * @throws VapiApiException
     */
    public function phoneNumberControllerFindAllPaginated(PhoneNumberControllerFindAllPaginatedRequest $request = new PhoneNumberControllerFindAllPaginatedRequest(), ?array $options = null): ?PhoneNumberPaginatedResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->search != null) {
            $query['search'] = $request->search;
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
                    path: "v2/phone-number",
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
                return PhoneNumberPaginatedResponse::fromJson($json);
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
     * @return ?GetPhoneNumbersResponse
     * @throws VapiException
     * @throws VapiApiException
     */
    public function get(string $id, ?array $options = null): ?GetPhoneNumbersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "phone-number/{$id}",
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
                return GetPhoneNumbersResponse::fromJson($json);
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
     * @return ?DeletePhoneNumbersResponse
     * @throws VapiException
     * @throws VapiApiException
     */
    public function delete(string $id, ?array $options = null): ?DeletePhoneNumbersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "phone-number/{$id}",
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
                return DeletePhoneNumbersResponse::fromJson($json);
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
     * @param UpdatePhoneNumbersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdatePhoneNumbersResponse
     * @throws VapiException
     * @throws VapiApiException
     */
    public function update(string $id, UpdatePhoneNumbersRequest $request, ?array $options = null): ?UpdatePhoneNumbersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "phone-number/{$id}",
                    method: HttpMethod::PATCH,
                    body: $request->body,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return UpdatePhoneNumbersResponse::fromJson($json);
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
