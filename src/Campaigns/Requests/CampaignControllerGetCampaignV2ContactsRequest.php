<?php

namespace Vapi\Campaigns\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Campaigns\Types\CampaignControllerGetCampaignV2ContactsRequestStatusItem;
use Vapi\Campaigns\Types\CampaignControllerGetCampaignV2ContactsRequestSortBy;

class CampaignControllerGetCampaignV2ContactsRequest extends JsonSerializableType
{
    /**
     * This is the status to filter contacts by. Pass once or multiple times to
     * filter on any of the provided statuses.
     *
     * @var ?array<value-of<CampaignControllerGetCampaignV2ContactsRequestStatusItem>> $status
     */
    public ?array $status;

    /**
     * @var ?float $limit This is the maximum number of contacts to return. Defaults to 50.
     */
    public ?float $limit;

    /**
     * This is the column to sort by. Defaults to `position` — the order contacts
     * were uploaded, which is also dial order.
     *
     * `status` sorts by the enum's declaration order rather than alphabetically,
     * which means it reads as a lifecycle: pending, dispatched, completed,
     * failed, skipped, predial-failed.
     *
     * Only columns on `campaign_contact` are sortable. Call-level values such as
     * cost or duration live on the call and are attached after this query, so
     * sorting by them here would only reorder the current page.
     *
     * @var ?value-of<CampaignControllerGetCampaignV2ContactsRequestSortBy> $sortBy
     */
    public ?string $sortBy;

    /**
     * @var ?float $page This is the page number to return. Defaults to 1.
     */
    public ?float $page;

    /**
     * @param array{
     *   status?: ?array<value-of<CampaignControllerGetCampaignV2ContactsRequestStatusItem>>,
     *   limit?: ?float,
     *   sortBy?: ?value-of<CampaignControllerGetCampaignV2ContactsRequestSortBy>,
     *   page?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->sortBy = $values['sortBy'] ?? null;
        $this->page = $values['page'] ?? null;
    }
}
