<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SquadVersionPaginatedResponse extends JsonSerializableType
{
    /**
     * @var array<SquadVersion> $results
     */
    #[JsonProperty('results'), ArrayType([SquadVersion::class])]
    public array $results;

    /**
     * @var SquadVersionPaginatedMetadata $metadata
     */
    #[JsonProperty('metadata')]
    public SquadVersionPaginatedMetadata $metadata;

    /**
     * @param array{
     *   results: array<SquadVersion>,
     *   metadata: SquadVersionPaginatedMetadata,
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
