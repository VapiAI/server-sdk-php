<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ToolDraftPaginatedMetadata extends JsonSerializableType
{
    /**
     * @var ?string $nextCursor
     */
    #[JsonProperty('nextCursor')]
    public ?string $nextCursor;

    /**
     * @var bool $hasNextPage
     */
    #[JsonProperty('hasNextPage')]
    public bool $hasNextPage;

    /**
     * @var float $limit
     */
    #[JsonProperty('limit')]
    public float $limit;

    /**
     * @param array{
     *   hasNextPage: bool,
     *   limit: float,
     *   nextCursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->nextCursor = $values['nextCursor'] ?? null;
        $this->hasNextPage = $values['hasNextPage'];
        $this->limit = $values['limit'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
