<?php

namespace Vapi\Calls\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Types\StructuredOutputsFilterValue;
use Vapi\Calls\Types\CallControllerFindAllPaginatedRequestSortOrder;
use DateTime;

class CallControllerFindAllPaginatedRequest extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $assistantOverrides Filter by assistant overrides. Use variableValues to filter by template variables.
     */
    public ?array $assistantOverrides;

    /**
     * @var ?array<string, mixed> $customer Filter by customer properties. Supports filtering by number, name, externalId, and extension.
     */
    public ?array $customer;

    /**
     * @var ?string $assistantId This will return calls with the specified assistantId.
     */
    public ?string $assistantId;

    /**
     * @var ?string $assistantName This will return calls where the transient assistant name exactly matches the specified value (case-insensitive).
     */
    public ?string $assistantName;

    /**
     * @var ?string $id This will return calls with the specified callId.
     */
    public ?string $id;

    /**
     * @var ?array<?string> $idAny This will return calls with the specified callIds.
     */
    public ?array $idAny;

    /**
     * @var ?float $costLe This will return calls where the cost is less than or equal to the specified value.
     */
    public ?float $costLe;

    /**
     * @var ?float $costGe This will return calls where the cost is greater than or equal to the specified value.
     */
    public ?float $costGe;

    /**
     * @var ?float $cost This will return calls with the exact specified cost.
     */
    public ?float $cost;

    /**
     * @var ?string $successEvaluation This will return calls with the specified successEvaluation.
     */
    public ?string $successEvaluation;

    /**
     * @var ?string $endedReason This will return calls with the specified endedReason.
     */
    public ?string $endedReason;

    /**
     * @var ?string $phoneNumberId This will return calls with the specified phoneNumberId.
     */
    public ?string $phoneNumberId;

    /**
     * @var ?array<string, ?StructuredOutputsFilterValue> $structuredOutputs Filter calls by structured output values. Use structured output ID as key and filter operators as values.
     */
    public ?array $structuredOutputs;

    /**
     * @var ?float $page This is the page number to return. Defaults to 1.
     */
    public ?float $page;

    /**
     * @var ?value-of<CallControllerFindAllPaginatedRequestSortOrder> $sortOrder This is the sort order for pagination. Defaults to 'DESC'.
     */
    public ?string $sortOrder;

    /**
     * @var ?float $limit This is the maximum number of items to return. Defaults to 100.
     */
    public ?float $limit;

    /**
     * @var ?DateTime $createdAtGt This will return items where the createdAt is greater than the specified value.
     */
    public ?DateTime $createdAtGt;

    /**
     * @var ?DateTime $createdAtLt This will return items where the createdAt is less than the specified value.
     */
    public ?DateTime $createdAtLt;

    /**
     * @var ?DateTime $createdAtGe This will return items where the createdAt is greater than or equal to the specified value.
     */
    public ?DateTime $createdAtGe;

    /**
     * @var ?DateTime $createdAtLe This will return items where the createdAt is less than or equal to the specified value.
     */
    public ?DateTime $createdAtLe;

    /**
     * @var ?DateTime $updatedAtGt This will return items where the updatedAt is greater than the specified value.
     */
    public ?DateTime $updatedAtGt;

    /**
     * @var ?DateTime $updatedAtLt This will return items where the updatedAt is less than the specified value.
     */
    public ?DateTime $updatedAtLt;

    /**
     * @var ?DateTime $updatedAtGe This will return items where the updatedAt is greater than or equal to the specified value.
     */
    public ?DateTime $updatedAtGe;

    /**
     * @var ?DateTime $updatedAtLe This will return items where the updatedAt is less than or equal to the specified value.
     */
    public ?DateTime $updatedAtLe;

    /**
     * @param array{
     *   assistantOverrides?: ?array<string, mixed>,
     *   customer?: ?array<string, mixed>,
     *   assistantId?: ?string,
     *   assistantName?: ?string,
     *   id?: ?string,
     *   idAny?: ?array<?string>,
     *   costLe?: ?float,
     *   costGe?: ?float,
     *   cost?: ?float,
     *   successEvaluation?: ?string,
     *   endedReason?: ?string,
     *   phoneNumberId?: ?string,
     *   structuredOutputs?: ?array<string, ?StructuredOutputsFilterValue>,
     *   page?: ?float,
     *   sortOrder?: ?value-of<CallControllerFindAllPaginatedRequestSortOrder>,
     *   limit?: ?float,
     *   createdAtGt?: ?DateTime,
     *   createdAtLt?: ?DateTime,
     *   createdAtGe?: ?DateTime,
     *   createdAtLe?: ?DateTime,
     *   updatedAtGt?: ?DateTime,
     *   updatedAtLt?: ?DateTime,
     *   updatedAtGe?: ?DateTime,
     *   updatedAtLe?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->assistantOverrides = $values['assistantOverrides'] ?? null;
        $this->customer = $values['customer'] ?? null;
        $this->assistantId = $values['assistantId'] ?? null;
        $this->assistantName = $values['assistantName'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->idAny = $values['idAny'] ?? null;
        $this->costLe = $values['costLe'] ?? null;
        $this->costGe = $values['costGe'] ?? null;
        $this->cost = $values['cost'] ?? null;
        $this->successEvaluation = $values['successEvaluation'] ?? null;
        $this->endedReason = $values['endedReason'] ?? null;
        $this->phoneNumberId = $values['phoneNumberId'] ?? null;
        $this->structuredOutputs = $values['structuredOutputs'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->createdAtGt = $values['createdAtGt'] ?? null;
        $this->createdAtLt = $values['createdAtLt'] ?? null;
        $this->createdAtGe = $values['createdAtGe'] ?? null;
        $this->createdAtLe = $values['createdAtLe'] ?? null;
        $this->updatedAtGt = $values['updatedAtGt'] ?? null;
        $this->updatedAtLt = $values['updatedAtLt'] ?? null;
        $this->updatedAtGe = $values['updatedAtGe'] ?? null;
        $this->updatedAtLe = $values['updatedAtLe'] ?? null;
    }
}
