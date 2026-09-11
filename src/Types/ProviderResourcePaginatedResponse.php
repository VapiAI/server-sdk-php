<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * A paginated collection of provider resources and metadata describing the result set.
 */
class ProviderResourcePaginatedResponse extends JsonSerializableType
{
    /**
     * @var array<ProviderResource> $results The provider resources returned for the current page.
     */
    #[JsonProperty('results'), ArrayType([ProviderResource::class])]
    public array $results;

    /**
     * @var PaginationMeta $metadata Pagination metadata for the provider-resource result set.
     */
    #[JsonProperty('metadata')]
    public PaginationMeta $metadata;

    /**
     * @param array{
     *   results: array<ProviderResource>,
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
