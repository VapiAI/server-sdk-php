<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class GetToolDraftsDto extends JsonSerializableType
{
    /**
     * @var ?string $cursor Opaque base64-encoded keyset cursor. Omit on first page.
     */
    #[JsonProperty('cursor')]
    public ?string $cursor;

    /**
     * @var ?float $limit Page size, defaults to 25, capped at 100.
     */
    #[JsonProperty('limit')]
    public ?float $limit;

    /**
     * @var ?string $createdBy
     */
    #[JsonProperty('createdBy')]
    public ?string $createdBy;

    /**
     * @param array{
     *   cursor?: ?string,
     *   limit?: ?float,
     *   createdBy?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->createdBy = $values['createdBy'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
