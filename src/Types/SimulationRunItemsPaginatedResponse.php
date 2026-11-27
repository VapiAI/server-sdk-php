<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SimulationRunItemsPaginatedResponse extends JsonSerializableType
{
    /**
     * @var array<SimulationRunItem> $results
     */
    #[JsonProperty('results'), ArrayType([SimulationRunItem::class])]
    public array $results;

    /**
     * @var PaginationMeta $metadata
     */
    #[JsonProperty('metadata')]
    public PaginationMeta $metadata;

    /**
     * @param array{
     *   results: array<SimulationRunItem>,
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
