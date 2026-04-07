<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class RelayTargetSquad extends JsonSerializableType
{
    /**
     * @var ?string $squadId The unique identifier of the squad
     */
    #[JsonProperty('squadId')]
    public ?string $squadId;

    /**
     * @var ?string $squadName The name of the squad
     */
    #[JsonProperty('squadName')]
    public ?string $squadName;

    /**
     * @param array{
     *   squadId?: ?string,
     *   squadName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->squadId = $values['squadId'] ?? null;
        $this->squadName = $values['squadName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
