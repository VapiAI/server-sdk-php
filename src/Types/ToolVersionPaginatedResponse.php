<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class ToolVersionPaginatedResponse extends JsonSerializableType
{
    /**
     * @var array<ToolVersion> $results
     */
    #[JsonProperty('results'), ArrayType([ToolVersion::class])]
    public array $results;

    /**
     * @var ToolVersionPaginatedMetadata $metadata
     */
    #[JsonProperty('metadata')]
    public ToolVersionPaginatedMetadata $metadata;

    /**
     * @param array{
     *   results: array<ToolVersion>,
     *   metadata: ToolVersionPaginatedMetadata,
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
