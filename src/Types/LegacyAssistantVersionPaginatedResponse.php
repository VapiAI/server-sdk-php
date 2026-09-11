<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class LegacyAssistantVersionPaginatedResponse extends JsonSerializableType
{
    /**
     * @var array<LegacyAssistantVersion> $results
     */
    #[JsonProperty('results'), ArrayType([LegacyAssistantVersion::class])]
    public array $results;

    /**
     * @var PaginationMeta $metadata
     */
    #[JsonProperty('metadata')]
    public PaginationMeta $metadata;

    /**
     * @var ?string $nextPageState
     */
    #[JsonProperty('nextPageState')]
    public ?string $nextPageState;

    /**
     * @param array{
     *   results: array<LegacyAssistantVersion>,
     *   metadata: PaginationMeta,
     *   nextPageState?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->results = $values['results'];
        $this->metadata = $values['metadata'];
        $this->nextPageState = $values['nextPageState'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
