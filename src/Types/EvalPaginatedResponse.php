<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class EvalPaginatedResponse extends JsonSerializableType
{
    /**
     * @var array<Eval> $results
     */
    #[JsonProperty('results'), ArrayType([Eval::class])]
    public array $results;

    /**
     * @var PaginationMeta $metadata
     */
    #[JsonProperty('metadata')]
    public PaginationMeta $metadata;

    /**
     * @param array{
     *   results: array<Eval>,
     *   metadata: PaginationMeta,
     * } $values
     */
    public function __construct(
        array $values,
    )
    {
        $this->results = $values['results'];$this->metadata = $values['metadata'];
    }

    /**
     * @return string
     */
    public function __toString(): string {
        return $this->toJson();
    }
}
