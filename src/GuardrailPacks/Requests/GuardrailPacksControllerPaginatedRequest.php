<?php

namespace Vapi\GuardrailPacks\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\GuardrailPacks\Types\GuardrailPacksControllerPaginatedRequestSortBy;
use DateTime;
use Vapi\GuardrailPacks\Types\GuardrailPacksControllerPaginatedRequestSortOrder;

class GuardrailPacksControllerPaginatedRequest extends JsonSerializableType
{
    /**
     * @var ?float $limit
     */
    public ?float $limit;

    /**
     * @var ?string $search Case-insensitive name or identifier fragment; omitted means all resources.
     */
    public ?string $search;

    /**
     * @var ?value-of<GuardrailPacksControllerPaginatedRequestSortBy> $sortBy Only persisted creation order is supported, with the ID as a stable tie-breaker.
     */
    public ?string $sortBy;

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
     * @var ?float $page A safe integer page; the reader also validates the computed offset.
     */
    public ?float $page;

    /**
     * @var ?value-of<GuardrailPacksControllerPaginatedRequestSortOrder> $sortOrder This is the sort order for pagination. Defaults to 'DESC'.
     */
    public ?string $sortOrder;

    /**
     * @param array{
     *   limit?: ?float,
     *   search?: ?string,
     *   sortBy?: ?value-of<GuardrailPacksControllerPaginatedRequestSortBy>,
     *   createdAtGt?: ?DateTime,
     *   createdAtLt?: ?DateTime,
     *   createdAtGe?: ?DateTime,
     *   createdAtLe?: ?DateTime,
     *   updatedAtGt?: ?DateTime,
     *   updatedAtLt?: ?DateTime,
     *   updatedAtGe?: ?DateTime,
     *   updatedAtLe?: ?DateTime,
     *   page?: ?float,
     *   sortOrder?: ?value-of<GuardrailPacksControllerPaginatedRequestSortOrder>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->search = $values['search'] ?? null;
        $this->sortBy = $values['sortBy'] ?? null;
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
