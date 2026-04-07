<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationRunItemCallMonitor extends JsonSerializableType
{
    /**
     * @var ?string $listenUrl This is the WebSocket URL to listen to the live call audio (combined both parties).
     */
    #[JsonProperty('listenUrl')]
    public ?string $listenUrl;

    /**
     * @param array{
     *   listenUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->listenUrl = $values['listenUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
