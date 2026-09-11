<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * A paginated collection of saved reporting insights and metadata describing the result set.
 */
class InsightPaginatedResponse extends JsonSerializableType
{
    /**
     * @var array<Insight> $results The reporting insights returned for the current page.
     */
    #[JsonProperty('results'), ArrayType([Insight::class])]
    public array $results;

    /**
     * @var PaginationMeta $metadata Pagination metadata for the insight result set.
     */
    #[JsonProperty('metadata')]
    public PaginationMeta $metadata;

    /**
     * @param array{
     *   results: array<Insight>,
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
