<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

/**
 * Pagination and retention metadata returned with a paginated list of phone numbers.
 */
class PaginationMeta extends JsonSerializableType
{
    /**
     * @var float $itemsPerPage The number of phone numbers returned per page.
     */
    #[JsonProperty('itemsPerPage')]
    public float $itemsPerPage;

    /**
     * @var float $totalItems The total number of phone numbers matching the request.
     */
    #[JsonProperty('totalItems')]
    public float $totalItems;

    /**
     * @var float $currentPage The current page number.
     */
    #[JsonProperty('currentPage')]
    public float $currentPage;

    /**
     * @var ?float $totalPages
     */
    #[JsonProperty('totalPages')]
    public ?float $totalPages;

    /**
     * @var ?bool $hasNextPage
     */
    #[JsonProperty('hasNextPage')]
    public ?bool $hasNextPage;

    /**
     * Opaque cursor for the next page under keyset pagination (PRO-3163). Pass it
     * back as the `cursor` query param to fetch the next page without an OFFSET
     * scan. Present only when a further page likely exists.
     *
     * @var ?string $nextCursor
     */
    #[JsonProperty('nextCursor')]
    public ?string $nextCursor;

    /**
     * @var ?value-of<PaginationMetaSortOrder> $sortOrder
     */
    #[JsonProperty('sortOrder')]
    public ?string $sortOrder;

    /**
     * @var ?bool $itemsBeyondRetention Whether additional matching phone numbers exist beyond the organization's data-retention window.
     */
    #[JsonProperty('itemsBeyondRetention')]
    public ?bool $itemsBeyondRetention;

    /**
     * @var ?DateTime $createdAtLe The inclusive upper creation-time boundary applied to the result set.
     */
    #[JsonProperty('createdAtLe'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAtLe;

    /**
     * @var ?DateTime $createdAtGe The inclusive lower creation-time boundary applied to the result set.
     */
    #[JsonProperty('createdAtGe'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAtGe;

    /**
     * @param array{
     *   itemsPerPage: float,
     *   totalItems: float,
     *   currentPage: float,
     *   totalPages?: ?float,
     *   hasNextPage?: ?bool,
     *   nextCursor?: ?string,
     *   sortOrder?: ?value-of<PaginationMetaSortOrder>,
     *   itemsBeyondRetention?: ?bool,
     *   createdAtLe?: ?DateTime,
     *   createdAtGe?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->itemsPerPage = $values['itemsPerPage'];
        $this->totalItems = $values['totalItems'];
        $this->currentPage = $values['currentPage'];
        $this->totalPages = $values['totalPages'] ?? null;
        $this->hasNextPage = $values['hasNextPage'] ?? null;
        $this->nextCursor = $values['nextCursor'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
        $this->itemsBeyondRetention = $values['itemsBeyondRetention'] ?? null;
        $this->createdAtLe = $values['createdAtLe'] ?? null;
        $this->createdAtGe = $values['createdAtGe'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
