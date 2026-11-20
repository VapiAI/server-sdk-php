<?php

namespace Vapi\TrafficAllocations\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\TrafficAllocations\Types\TrafficAllocationControllerFindAllPaginatedRequestSortOrder;

class TrafficAllocationControllerFindAllPaginatedRequest extends JsonSerializableType
{
    /**
     * @var ?string $assistantId Filter to allocations for this assistant.
     */
    public ?string $assistantId;

    /**
     * @var ?int $page The page number to return. Defaults to 1.
     */
    public ?int $page;

    /**
     * @var ?int $limit The maximum number of items to return. Defaults to 100.
     */
    public ?int $limit;

    /**
     * @var ?value-of<TrafficAllocationControllerFindAllPaginatedRequestSortOrder> $sortOrder The sort order for pagination. Defaults to 'DESC'.
     */
    public ?string $sortOrder;

    /**
     * @param array{
     *   assistantId?: ?string,
     *   page?: ?int,
     *   limit?: ?int,
     *   sortOrder?: ?value-of<TrafficAllocationControllerFindAllPaginatedRequestSortOrder>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->assistantId = $values['assistantId'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
    }
}
