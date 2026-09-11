<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * GHL workflow and location identifiers attached to a tool.
 */
class GhlToolMetadata extends JsonSerializableType
{
    /**
     * @var ?string $workflowId GHL workflow identifier associated with the tool.
     */
    #[JsonProperty('workflowId')]
    public ?string $workflowId;

    /**
     * @var ?string $locationId GHL location identifier associated with the tool.
     */
    #[JsonProperty('locationId')]
    public ?string $locationId;

    /**
     * @param array{
     *   workflowId?: ?string,
     *   locationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->workflowId = $values['workflowId'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
