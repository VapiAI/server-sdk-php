<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * A paginated collection of scorecards and metadata describing the result set.
 */
class ScorecardPaginatedResponse extends JsonSerializableType
{
    /**
     * @var array<Scorecard> $results The scorecards returned for the current page.
     */
    #[JsonProperty('results'), ArrayType([Scorecard::class])]
    public array $results;

    /**
     * @var PaginationMeta $metadata Pagination metadata for the scorecard result set.
     */
    #[JsonProperty('metadata')]
    public PaginationMeta $metadata;

    /**
     * @param array{
     *   results: array<Scorecard>,
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
