<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class AssistantVersionPaginatedResponse extends JsonSerializableType
{
    /**
     * @var array<AssistantVersion> $results
     */
    #[JsonProperty('results'), ArrayType([AssistantVersion::class])]
    public array $results;

    /**
     * @var AssistantVersionPaginatedMetadata $metadata
     */
    #[JsonProperty('metadata')]
    public AssistantVersionPaginatedMetadata $metadata;

    /**
     * @param array{
     *   results: array<AssistantVersion>,
     *   metadata: AssistantVersionPaginatedMetadata,
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
