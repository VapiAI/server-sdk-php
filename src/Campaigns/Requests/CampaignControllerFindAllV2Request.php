<?php

namespace Vapi\Campaigns\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Campaigns\Types\CampaignControllerFindAllV2RequestStatus;
use Vapi\Campaigns\Types\CampaignControllerFindAllV2RequestSortOrder;
use Vapi\Campaigns\Types\CampaignControllerFindAllV2RequestSortBy;
use DateTime;

class CampaignControllerFindAllV2Request extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    public ?string $id;

    /**
     * @var ?value-of<CampaignControllerFindAllV2RequestStatus> $status
     */
    public ?string $status;

    /**
     * When true, every campaign in the response includes `contactCounters` and
     * `callMetrics`. These are aggregate queries over contacts and events —
     * batched across the page, so the cost is three queries per request rather
     * than three per campaign, but still opt-in rather than paid for on every
     * read. Defaults to false.
     *
     * @var ?bool $includeCounters
     */
    public ?bool $includeCounters;

    /**
     * @var ?float $page This is the page number to return. Defaults to 1.
     */
    public ?float $page;

    /**
     * @var ?value-of<CampaignControllerFindAllV2RequestSortOrder> $sortOrder This is the sort order for pagination. Defaults to 'DESC'.
     */
    public ?string $sortOrder;

    /**
     * @var ?value-of<CampaignControllerFindAllV2RequestSortBy> $sortBy This is the column to sort by. Defaults to 'createdAt'.
     */
    public ?string $sortBy;

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
     *   id?: ?string,
     *   status?: ?value-of<CampaignControllerFindAllV2RequestStatus>,
     *   includeCounters?: ?bool,
     *   page?: ?float,
     *   sortOrder?: ?value-of<CampaignControllerFindAllV2RequestSortOrder>,
     *   sortBy?: ?value-of<CampaignControllerFindAllV2RequestSortBy>,
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
        $this->id = $values['id'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->includeCounters = $values['includeCounters'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
        $this->sortBy = $values['sortBy'] ?? null;
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
