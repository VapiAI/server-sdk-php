<?php

namespace Vapi\Eval\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Eval\Types\EvalControllerGetRunsPaginatedRequestSortBy;
use DateTime;
use Vapi\Eval\Types\EvalControllerGetRunsPaginatedRequestSortOrder;

class EvalControllerGetRunsPaginatedRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<EvalControllerGetRunsPaginatedRequestSortBy> $sortBy
     */
    public ?string $sortBy;

    /**
     * @var ?string $search Literal, case-insensitive search across eval and assistant names.
     */
    public ?string $search;

    /**
     * @var ?string $id Filters eval runs by ID.
     */
    public ?string $id;

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
     * @var ?float $page This is the page number to return. Defaults to 1.
     */
    public ?float $page;

    /**
     * @var ?value-of<EvalControllerGetRunsPaginatedRequestSortOrder> $sortOrder This is the sort order for pagination. Defaults to 'DESC'.
     */
    public ?string $sortOrder;

    /**
     * @param array{
     *   sortBy?: ?value-of<EvalControllerGetRunsPaginatedRequestSortBy>,
     *   search?: ?string,
     *   id?: ?string,
     *   limit?: ?float,
     *   createdAtGt?: ?DateTime,
     *   createdAtLt?: ?DateTime,
     *   createdAtGe?: ?DateTime,
     *   createdAtLe?: ?DateTime,
     *   updatedAtGt?: ?DateTime,
     *   updatedAtLt?: ?DateTime,
     *   updatedAtGe?: ?DateTime,
     *   updatedAtLe?: ?DateTime,
     *   page?: ?float,
     *   sortOrder?: ?value-of<EvalControllerGetRunsPaginatedRequestSortOrder>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sortBy = $values['sortBy'] ?? null;
        $this->search = $values['search'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->createdAtGt = $values['createdAtGt'] ?? null;
        $this->createdAtLt = $values['createdAtLt'] ?? null;
        $this->createdAtGe = $values['createdAtGe'] ?? null;
        $this->createdAtLe = $values['createdAtLe'] ?? null;
        $this->updatedAtGt = $values['updatedAtGt'] ?? null;
        $this->updatedAtLt = $values['updatedAtLt'] ?? null;
        $this->updatedAtGe = $values['updatedAtGe'] ?? null;
        $this->updatedAtLe = $values['updatedAtLe'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
    }
}
