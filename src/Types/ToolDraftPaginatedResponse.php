<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class ToolDraftPaginatedResponse extends JsonSerializableType
{
    /**
     * @var array<ToolDraft> $results
     */
    #[JsonProperty('results'), ArrayType([ToolDraft::class])]
    public array $results;

    /**
     * @var ToolDraftPaginatedMetadata $metadata
     */
    #[JsonProperty('metadata')]
    public ToolDraftPaginatedMetadata $metadata;

    /**
     * @param array{
     *   results: array<ToolDraft>,
     *   metadata: ToolDraftPaginatedMetadata,
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
