<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class GetTrafficAllocationPaginatedDto extends JsonSerializableType
{
    /**
     * @var ?string $assistantId Filter to allocations for this assistant.
     */
    #[JsonProperty('assistantId')]
    public ?string $assistantId;

    /**
     * @var ?int $page The page number to return. Defaults to 1.
     */
    #[JsonProperty('page')]
    public ?int $page;

    /**
     * @var ?int $limit The maximum number of items to return. Defaults to 100.
     */
    #[JsonProperty('limit')]
    public ?int $limit;

    /**
     * @var ?value-of<GetTrafficAllocationPaginatedDtoSortOrder> $sortOrder The sort order for pagination. Defaults to 'DESC'.
     */
    #[JsonProperty('sortOrder')]
    public ?string $sortOrder;

    /**
     * @param array{
     *   assistantId?: ?string,
     *   page?: ?int,
     *   limit?: ?int,
     *   sortOrder?: ?value-of<GetTrafficAllocationPaginatedDtoSortOrder>,
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

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
