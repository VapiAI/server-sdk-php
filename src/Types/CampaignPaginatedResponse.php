<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * A paginated collection of outbound calling campaigns and metadata describing the result set.
 */
class CampaignPaginatedResponse extends JsonSerializableType
{
    /**
     * @var array<Campaign> $results The campaigns returned for the current page.
     */
    #[JsonProperty('results'), ArrayType([Campaign::class])]
    public array $results;

    /**
     * @var PaginationMeta $metadata Pagination metadata for the campaign result set.
     */
    #[JsonProperty('metadata')]
    public PaginationMeta $metadata;

    /**
     * @param array{
     *   results: array<Campaign>,
     *   metadata: PaginationMeta,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->results = $values['results'];
        $this->metadata = $values['metadata'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
