<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * A paginated collection of eval runs and metadata describing the result set.
 */
class EvalRunPaginatedResponse extends JsonSerializableType
{
    /**
     * @var array<EvalRun> $results The eval runs returned for the current page.
     */
    #[JsonProperty('results'), ArrayType([EvalRun::class])]
    public array $results;

    /**
     * @var PaginationMeta $metadata Pagination metadata for the eval-run result set.
     */
    #[JsonProperty('metadata')]
    public PaginationMeta $metadata;

    /**
     * @param array{
     *   results: array<EvalRun>,
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
