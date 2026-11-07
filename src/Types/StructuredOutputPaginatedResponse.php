<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * A paginated collection of structured-output definitions and metadata describing the result set.
 */
class StructuredOutputPaginatedResponse extends JsonSerializableType
{
    /**
     * @var array<StructuredOutput> $results The structured-output definitions returned for the current page.
     */
    #[JsonProperty('results'), ArrayType([StructuredOutput::class])]
    public array $results;

    /**
     * @var PaginationMeta $metadata Pagination metadata for the structured-output result set.
     */
    #[JsonProperty('metadata')]
    public PaginationMeta $metadata;

    /**
     * @param array{
     *   results: array<StructuredOutput>,
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
