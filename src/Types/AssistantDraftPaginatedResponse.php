<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class AssistantDraftPaginatedResponse extends JsonSerializableType
{
    /**
     * @var array<AssistantDraft> $results
     */
    #[JsonProperty('results'), ArrayType([AssistantDraft::class])]
    public array $results;

    /**
     * @var AssistantDraftPaginatedMetadata $metadata
     */
    #[JsonProperty('metadata')]
    public AssistantDraftPaginatedMetadata $metadata;

    /**
     * @param array{
     *   results: array<AssistantDraft>,
     *   metadata: AssistantDraftPaginatedMetadata,
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
